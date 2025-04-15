package planeshooter;

import javax.swing.*;
import java.awt.*;
import java.awt.event.*;
import java.awt.image.BufferedImage;
import java.util.List;
import java.util.ArrayList;
import javax.sound.sampled.*;
import java.io.File;

public class GamePanel extends JPanel implements KeyListener, Runnable {
    // Game objects
    private Plane player;
    private List<Bullet> bullets = new ArrayList<>();
    private List<Enemy> enemies = new ArrayList<>();
    
    // Threads
    private Thread gameThread;
    private Thread enemySpawner;
    
    // Game state
    private int score = 0;
    private int highScore = 0;
    private int lives = 5;
    private boolean gameOver = false;
    private boolean isPaused = false;
    private boolean levelCompleted = false;
    
    // Level progression
    private int currentLevel = 1;
    private int levelThreshold = 100;
    private int enemySpawnDelay = 2000;
    
    // Resources
    private Image background;
    private Clip shootSound, explosionSound, pauseSound;

    public GamePanel() {
        player = new Plane(375, 500);
        setFocusable(true);
        addKeyListener(this);
        setDoubleBuffered(true);
        
        loadResources();
        startGame();
    }

    private void loadResources() {
        try {
            // Load background image
            ImageIcon backgroundIcon = new ImageIcon("C:\\Users\\USER\\Documents\\NetBeansProjects\\planeshooter\\src\\main\\java\\assets\\background.jpg");
            background = backgroundIcon.getImage();
            
            // Load sounds using File instead of getResource
            AudioInputStream audioIn;
            
            // Shoot sound
            audioIn = AudioSystem.getAudioInputStream(
                new File("C:\\Users\\USER\\Documents\\NetBeansProjects\\planeshooter\\src\\main\\java\\assets\\shoot.wav"));
            shootSound = AudioSystem.getClip();
            shootSound.open(audioIn);
            
            // Explosion sound
            audioIn = AudioSystem.getAudioInputStream(
                new File("C:\\Users\\USER\\Documents\\NetBeansProjects\\planeshooter\\src\\main\\java\\assets\\expolsion.wav"));
            explosionSound = AudioSystem.getClip();
            explosionSound.open(audioIn);
            
            // Try to load pause sound if available
            try {
                audioIn = AudioSystem.getAudioInputStream(
                    new File("C:\\Users\\USER\\Documents\\NetBeansProjects\\planeshooter\\src\\main\\java\\assets\\pause.wav"));
                pauseSound = AudioSystem.getClip();
                pauseSound.open(audioIn);
            } catch (Exception e) {
                System.err.println("Couldn't load pause sound, continuing without it");
            }
            
        } catch (Exception e) {
            System.err.println("Error loading resources: " + e.getMessage());
            e.printStackTrace();
        }
    }

    private void startGame() {
        gameOver = false;
        isPaused = false;
        score = 0;
        lives = 5;
        currentLevel = 1;
        levelThreshold = 100;
        enemySpawnDelay = 2000;
        
        bullets.clear();
        enemies.clear();
        
        player.x = 375;
        player.y = 500;
        
        if (gameThread != null) gameThread.interrupt();
        if (enemySpawner != null) enemySpawner.interrupt();
        
        gameThread = new Thread(this);
        gameThread.start();
        startEnemySpawner();
    }

    private void startEnemySpawner() {
        enemySpawner = new Thread(() -> {
            while (!gameOver && !levelCompleted) {
                if (!isPaused) {
                    // Changed: Spawn enemies from left side instead of top
                    int enemyY = (int)(Math.random() * (getHeight() - 80));
                    enemies.add(new Enemy(-40, enemyY));
                }
                try {
                    Thread.sleep(enemySpawnDelay);
                } catch (InterruptedException e) {
                    break;
                }
            }
        });
        enemySpawner.start();
    }

    private void startNextLevel() {
        bullets.clear();
        enemies.clear();
        
        currentLevel++;
        levelThreshold = currentLevel * 100;
        enemySpawnDelay = Math.max(500, 2000 - (currentLevel * 150));
        
        player.x = 375;
        player.y = 500;
        levelCompleted = false;
        
        if (enemySpawner != null) enemySpawner.interrupt();
        startEnemySpawner();
    }

    private void togglePause() {
        isPaused = !isPaused;
        playSound(pauseSound);
        repaint();
    }

    @Override
    public void paintComponent(Graphics g) {
        super.paintComponent(g);
        
        // Draw background
        if (background != null) {
            g.drawImage(background, 0, 0, getWidth(), getHeight(), null);
        } else {
            g.setColor(Color.BLACK);
            g.fillRect(0, 0, getWidth(), getHeight());
        }

        drawPlayer(g);
        drawBullets(g);
        drawEnemies(g);
        drawHUD(g);
        
        if (isPaused) drawPauseScreen(g);
        if (gameOver) drawGameOverScreen(g);
        if (levelCompleted) drawLevelCompleteScreen(g);
    }

    private void drawPlayer(Graphics g) {
        if (player.image != null) {
            g.drawImage(player.image, player.x, player.y, 50, 50, null);
            
            // Engine glow
            g.setColor(new Color(255, 200, 50, 100));
            g.fillOval(player.x + 15, player.y + 45, 20, 8);
        } else {
            System.err.println("Player image not loaded! Using fallback");
            g.setColor(Color.GREEN);
            int[] xPoints = {player.x+25, player.x, player.x+50};
            int[] yPoints = {player.y, player.y+50, player.y+50};
            g.fillPolygon(xPoints, yPoints, 3);
        }
    }

    private void drawBullets(Graphics g) {
        g.setColor(Color.CYAN);
        for (Bullet b : bullets) {
            g.fillRect(b.x, b.y, 3, 10);
            
            // Glow effect
            g.setColor(new Color(0, 255, 255, 70));
            g.fillRect(b.x-1, b.y-1, 5, 12);
            g.setColor(Color.CYAN);
        }
    }

    private void drawEnemies(Graphics g) {
        for (Enemy e : enemies) {
            if (e.image != null) {
                g.drawImage(e.image, e.x, e.y, 40, 40, null);
                
                // Engine glow - moved to left side since enemies now face right
                g.setColor(new Color(255, 100, 0, 100));
                g.fillOval(e.x - 1, e.y + 15, 6, 10);
            } else {
                System.err.println("Enemy image not loaded! Using fallback");
                g.setColor(Color.RED);
                // Modified triangle pointing right
                int[] xPoints = {e.x, e.x+40, e.x};
                int[] yPoints = {e.y, e.y+20, e.y+40};
                g.fillPolygon(xPoints, yPoints, 3);
            }
        }
    }

    private void drawHUD(Graphics g) {
        g.setColor(Color.WHITE);
        g.setFont(new Font("Arial", Font.BOLD, 18));
        g.drawString("Score: " + score, 10, 20);
        g.drawString("Lives: " + lives, 10, 40);
        g.drawString("Level: " + currentLevel, 10, 60);
        g.drawString("High Score: " + highScore, 10, 80);
    }

    private void drawPauseScreen(Graphics g) {
        g.setColor(new Color(0, 0, 0, 180));
        g.fillRect(0, 0, getWidth(), getHeight());
        
        g.setColor(Color.GREEN);
        g.setFont(new Font("Arial", Font.BOLD, 48));
        String pauseText = "PAUSED";
        g.drawString(pauseText, getWidth()/2 - g.getFontMetrics().stringWidth(pauseText)/2, getHeight()/2 - 30);
        
        g.setColor(Color.WHITE);
        g.setFont(new Font("Arial", Font.PLAIN, 24));
        g.drawString("Press P to Resume", getWidth()/2 - 80, getHeight()/2 + 20);
        g.drawString("Press Q to Quit", getWidth()/2 - 70, getHeight()/2 + 60);
    }

    private void drawGameOverScreen(Graphics g) {
        g.setColor(new Color(0, 0, 0, 180));
        g.fillRect(0, 0, getWidth(), getHeight());
        
        g.setColor(Color.RED);
        g.setFont(new Font("Arial", Font.BOLD, 50));
        String gameOverText = "GAME OVER";
        g.drawString(gameOverText, getWidth()/2 - g.getFontMetrics().stringWidth(gameOverText)/2, getHeight()/2 - 60);
        
        g.setColor(Color.GREEN);
        g.setFont(new Font("Arial", Font.BOLD, 24));
        g.drawString("Score: " + score, getWidth()/2 - 40, getHeight()/2);
        
        if (score > highScore) {
            highScore = score;
            g.setColor(Color.BLUE);
            g.drawString("NEW HIGH SCORE!", getWidth()/2 - 90, getHeight()/2 + 40);
        }
        
        g.setColor(Color.WHITE);
        g.setFont(new Font("Arial", Font.BOLD, 28));
        g.drawString("Press R to Restart", getWidth()/2 - 100, getHeight()/2 + 90);
        g.drawString("Press Q to Quit", getWidth()/2 - 80, getHeight()/2 + 130);
    }

    private void drawLevelCompleteScreen(Graphics g) {
        g.setColor(new Color(0, 0, 0, 180));
        g.fillRect(0, 0, getWidth(), getHeight());
        
        g.setColor(Color.GREEN);
        g.setFont(new Font("Arial", Font.BOLD, 36));
        String levelUpText = "LEVEL " + currentLevel + " COMPLETE!";
        g.drawString(levelUpText, getWidth()/2 - g.getFontMetrics().stringWidth(levelUpText)/2, getHeight()/2 - 30);
        
        g.setColor(Color.WHITE);
        g.setFont(new Font("Arial", Font.BOLD, 24));
        g.drawString("Press C to Continue", getWidth()/2 - 90, getHeight()/2 + 30);
        g.drawString("Press Q to Quit", getWidth()/2 - 70, getHeight()/2 + 70);
    }

    @Override
    public void run() {
        while (!gameOver) {
            if (!isPaused && !levelCompleted) {
                updateGame();
            }
            repaint();
            try {
                Thread.sleep(30);
            } catch (InterruptedException e) {
                break;
            }
        }
    }

    private void updateGame() {
        // Bullet movement
        List<Bullet> bulletsToRemove = new ArrayList<>();
        for (Bullet b : bullets) {
            b.y -= 15;
            if (b.y < 0) bulletsToRemove.add(b);
        }
        bullets.removeAll(bulletsToRemove);

        // Enemy movement - changed from moving down to moving right
        List<Enemy> enemiesToRemove = new ArrayList<>();
        for (Enemy e : enemies) {
            // Changed: Move enemies from left to right
            e.x += 3 + (currentLevel * 0.5);
            if (e.x > getWidth()) {
                enemiesToRemove.add(e);
                lives--;
                if (lives <= 0) gameOver = true;
            }
        }
        enemies.removeAll(enemiesToRemove);

        checkCollisions();

        if (score >= levelThreshold) {
            levelCompleted = true;
            if (enemySpawner != null) enemySpawner.interrupt();
        }
    }

    private void checkCollisions() {
        // Bullet-enemy collisions
        List<Bullet> bulletsToRemove = new ArrayList<>();
        List<Enemy> enemiesToRemove = new ArrayList<>();
        
        for (Bullet b : bullets) {
            Rectangle bulletRect = new Rectangle(b.x, b.y, 3, 10);
            for (Enemy e : enemies) {
                Rectangle enemyRect = new Rectangle(e.x, e.y, 40, 40);
                if (bulletRect.intersects(enemyRect)) {
                    playHitSoundShoot();
                    bulletsToRemove.add(b);
                    enemiesToRemove.add(e);
                    playSound(explosionSound);
                    score += 10;
                    break;
                }
            }
        }
        bullets.removeAll(bulletsToRemove);
        enemies.removeAll(enemiesToRemove);

        // Player-enemy collisions
        Rectangle playerRect = new Rectangle(player.x, player.y, 50, 50);
        for (Enemy e : enemies) {
            Rectangle enemyRect = new Rectangle(e.x, e.y, 40, 40);
            if (playerRect.intersects(enemyRect)) {
                enemies.remove(e);
                lives--;
                playSound(explosionSound);
                if (lives <= 0) gameOver = true;
                break;
            }
        }
    }

    @Override
    public void keyPressed(KeyEvent e) {
        int key = e.getKeyCode();
        
        // Universal controls
        if (key == KeyEvent.VK_P && !gameOver && !levelCompleted) {
            togglePause();
            return;
        }
        if (key == KeyEvent.VK_Q) {
            System.exit(0);
        }
        
        if (isPaused) return;
        
        if (gameOver) {
            if (key == KeyEvent.VK_R) startGame();
            return;
        }
        
        if (levelCompleted) {
            if (key == KeyEvent.VK_C) startNextLevel();
            return;
        }
        
        // Player controls
        if (key == KeyEvent.VK_LEFT && player.x > 0) player.x -= 10;
        if (key == KeyEvent.VK_RIGHT && player.x < getWidth() - 50) player.x += 10;
        if (key == KeyEvent.VK_UP && player.y > 0) player.y -= 10;
        if (key == KeyEvent.VK_DOWN && player.y < getHeight() - 50) player.y += 10;
        if (key == KeyEvent.VK_SPACE) {
            playHitSound();
            bullets.add(new Bullet(player.x + 21, player.y - 10));
            playSound(shootSound);
        }
    }

    private void playSound(Clip clip) {
        try {
            if (clip != null) {
                clip.stop();
                clip.setFramePosition(0);
                
                // Adjust volume if needed
                try {
                    FloatControl gainControl = (FloatControl) clip.getControl(FloatControl.Type.MASTER_GAIN);
                    gainControl.setValue(-10.0f); // Reduce volume by 10 decibels
                } catch (Exception e) {
                    System.err.println("Couldn't adjust volume for sound");
                }
                
                clip.start();
            }
        } catch (Exception e) {
            System.err.println("Error playing sound: " + e.getMessage());
        }
    }
    
    private void playHitSoundShoot() {
        try {
            // Path to the .wav file
            File soundFile = new File("C:\\Users\\USER\\Documents\\NetBeansProjects\\planeshooter\\src\\main\\java\\assets\\expolsion.wav");

            // Get an audio input stream from the file
            AudioInputStream audioIn = AudioSystem.getAudioInputStream(soundFile);

            // Get the format of the audio stream
            AudioFormat format = audioIn.getFormat();

            // If the format is PCM_FLOAT or unsupported, convert it to PCM_SIGNED 16-bit
            if (format.getEncoding() != AudioFormat.Encoding.PCM_SIGNED) {
                AudioFormat.Encoding encoding = AudioFormat.Encoding.PCM_SIGNED;
                AudioFormat newFormat = new AudioFormat(encoding,
                        format.getSampleRate(),
                        16, // 16-bit audio
                        format.getChannels(),
                        format.getChannels() * 2, // 2 bytes per frame for 16-bit
                        format.getSampleRate(),
                        false); // little-endian

                // Convert the audio input stream to the new format
                audioIn = AudioSystem.getAudioInputStream(newFormat, audioIn);
            }

            // Get a clip to play the sound
            Clip clip = AudioSystem.getClip();
            clip.open(audioIn);

            // Start playing the clip
            clip.start();

            // Optional: Add a LineListener to close the clip when it stops playing
            clip.addLineListener(event -> {
                if (event.getType() == LineEvent.Type.STOP) {
                    clip.close();
                }
            });

        } catch (Exception e) {
            e.printStackTrace();
            System.err.println("Error playing sound: " + e.getMessage());
        }
    }

    private void playHitSound() {
        try {
            // Path to the .wav file
            File soundFile = new File("C:\\Users\\USER\\Documents\\NetBeansProjects\\planeshooter\\src\\main\\java\\assets\\shoot.wav");

            // Get an audio input stream from the file
            AudioInputStream audioIn = AudioSystem.getAudioInputStream(soundFile);

            // Get the format of the audio stream
            AudioFormat format = audioIn.getFormat();

            // If the format is PCM_FLOAT or unsupported, convert it to PCM_SIGNED 16-bit
            if (format.getEncoding() != AudioFormat.Encoding.PCM_SIGNED) {
                AudioFormat.Encoding encoding = AudioFormat.Encoding.PCM_SIGNED;
                AudioFormat newFormat = new AudioFormat(encoding,
                        format.getSampleRate(),
                        16, // 16-bit audio
                        format.getChannels(),
                        format.getChannels() * 2, // 2 bytes per frame for 16-bit
                        format.getSampleRate(),
                        false); // little-endian

                // Convert the audio input stream to the new format
                audioIn = AudioSystem.getAudioInputStream(newFormat, audioIn);
            }

            // Get a clip to play the sound
            Clip clip = AudioSystem.getClip();
            clip.open(audioIn);

            // Start playing the clip
            clip.start();

            // Optional: Add a LineListener to close the clip when it stops playing
            clip.addLineListener(event -> {
                if (event.getType() == LineEvent.Type.STOP) {
                    clip.close();
                }
            });

        } catch (Exception e) {
            e.printStackTrace();
            System.err.println("Error playing sound: " + e.getMessage());
        }
    }

    @Override
    public void keyReleased(KeyEvent e) {}

    @Override
    public void keyTyped(KeyEvent e) {}
}