package ElementalRun;

import javax.swing.*;
import java.awt.*;
import java.awt.event.*;
import java.util.ArrayList;
import java.util.List;
import java.util.Random;

public class ElementalRun extends JPanel implements ActionListener, KeyListener {
    private static final int PANEL_WIDTH = 800;
    private static final int PANEL_HEIGHT = 600;
    private static final int GROUND_Y = PANEL_HEIGHT - 100;
    private static final int OBSTACLES_PER_LEVEL = 15;
    private static final int SPEED_INCREASE_PER_LEVEL = 2;
    
    private Player player;
    private List<Obstacle> obstacles;
    private Timer gameTimer;
    private int score;
    private boolean gameOver;
    private Random random;
    private GameFrame parentFrame;
    private int currentLevel = 1;
    private int obstaclesPassedThisLevel = 0;
    
    private Timer clickTimer;
    private int clickCount;
    private static final int CLICK_DELAY = 300;
    
    public ElementalRun(GameFrame parentFrame, Player.Sprite sprite) {
        this.parentFrame = parentFrame;
        setPreferredSize(new Dimension(PANEL_WIDTH, PANEL_HEIGHT));
        setBackground(Color.CYAN);
        setFocusable(true);
        addKeyListener(this);
        
        player = new Player(100, GROUND_Y, sprite);
        obstacles = new ArrayList<>();
        random = new Random();
        score = 0;
        gameOver = false;
        
        gameTimer = new Timer(20, this);
        gameTimer.start();
        
        Timer obstacleTimer = new Timer(2000, e -> addObstacle());
        obstacleTimer.start();
        
        clickCount = 0;
        clickTimer = new Timer(CLICK_DELAY, e -> {
            processMultipleClicks();
            clickTimer.stop();
        });
        
        // Add MouseListener for click detection
        addMouseListener(new MouseAdapter() {
            @Override
            public void mouseClicked(MouseEvent e) {
                if (gameOver) {
                    clickCount++;
                    if (!clickTimer.isRunning()) {
                        clickTimer.start();
                    }
                }
            }
        });
    }
    
    private void levelUp() {
        currentLevel++;
        obstaclesPassedThisLevel = 0;
        JOptionPane.showMessageDialog(this, 
            "Level Up! Now at Level " + currentLevel, 
            "Level Up!", 
            JOptionPane.INFORMATION_MESSAGE);
        player.increaseJumpStrength(1);
    }
    
    @Override
    protected void paintComponent(Graphics g) {
        super.paintComponent(g);
        drawBackground(g);
        player.draw(g);
        
        for (Obstacle obstacle : obstacles) {
            obstacle.draw(g);
        }
        
        g.setColor(Color.BLACK);
        g.setFont(new Font("Arial", Font.BOLD, 24));
        g.drawString("Score: " + score, 20, 40);
        g.drawString("Level: " + currentLevel, 20, 70);
        
        User currentUser = UserManager.getInstance().getCurrentUser();
        if (currentUser != null) {
            g.setFont(new Font("Arial", Font.PLAIN, 16));
            g.drawString("Player: " + currentUser.getUsername(), 20, 100);
            g.drawString("Best: " + currentUser.getBestScore(), 20, 120);
        }
        
        if (gameOver) {
            drawGameOverScreen(g);
        }
    }
    
    @Override
    public void actionPerformed(ActionEvent e) {
        if (!gameOver) {
            player.update();
            
            for (int i = obstacles.size() - 1; i >= 0; i--) {
                Obstacle obstacle = obstacles.get(i);
                obstacle.update();
                
                if (CollisionDetector.checkCollision(player, obstacle)) {
                    gameOver = true;
                    gameTimer.stop(); // Stop game updates
                    parentFrame.gameEnded(score);
                }
                
                if (obstacle.getX() + Obstacle.OBSTACLE_WIDTH < 0) {
                    obstacles.remove(i);
                    score += 10;
                    obstaclesPassedThisLevel++;
                    
                    if (obstaclesPassedThisLevel >= OBSTACLES_PER_LEVEL) {
                        levelUp();
                    }
                }
            }
        }
        repaint();
    }
    
    private void addObstacle() {
        if (!gameOver) {
            int height = random.nextInt(40) + 40;
            Obstacle obstacle = new Obstacle(PANEL_WIDTH, GROUND_Y - height, height, 
                                           Obstacle.BASE_SPEED + (currentLevel * SPEED_INCREASE_PER_LEVEL));
            obstacles.add(obstacle);
        }
    }
    
    private void drawBackground(Graphics g) {
        // Draw sky
        g.setColor(Color.CYAN);
        g.fillRect(0, 0, PANEL_WIDTH, PANEL_HEIGHT);
        
        // Draw ground
        g.setColor(new Color(139, 69, 19)); // Brown
        g.fillRect(0, GROUND_Y, PANEL_WIDTH, PANEL_HEIGHT - GROUND_Y);
        
        // Optional: Draw some grass
        g.setColor(Color.GREEN);
        g.fillRect(0, GROUND_Y - 5, PANEL_WIDTH, 5);
    }
    
    private void drawGameOverScreen(Graphics g) {
        // Semi-transparent overlay
        g.setColor(new Color(0, 0, 0, 150));
        g.fillRect(0, 0, PANEL_WIDTH, PANEL_HEIGHT);
        
        // Game over text
        g.setColor(Color.WHITE);
        g.setFont(new Font("Arial", Font.BOLD, 48));
        String gameOverText = "Game Over!";
        FontMetrics fm = g.getFontMetrics();
        int textWidth = fm.stringWidth(gameOverText);
        g.drawString(gameOverText, (PANEL_WIDTH - textWidth) / 2, PANEL_HEIGHT / 2 - 50);
        
        // Final score
        g.setFont(new Font("Arial", Font.BOLD, 24));
        String scoreText = "Final Score: " + score;
        textWidth = fm.stringWidth(scoreText);
        g.drawString(scoreText, (PANEL_WIDTH - textWidth) / 2, PANEL_HEIGHT / 2);
        
        // Instructions
        g.setFont(new Font("Arial", Font.PLAIN, 18));
        String instruction = "Press R to Restart or H for History";
        textWidth = fm.stringWidth(instruction);
        g.drawString(instruction, (PANEL_WIDTH - textWidth) / 2, PANEL_HEIGHT / 2 + 50);
    }
    
    private void processMultipleClicks() {
        if (clickCount >= 2 && gameOver) {
            // Restart game on double-click when game is over
            score = 0;
            currentLevel = 1;
            obstaclesPassedThisLevel = 0;
            obstacles.clear();
            player = new Player(100, GROUND_Y, player.getSprite());
            gameOver = false;
            gameTimer.start();
        }
        clickCount = 0;
    }
    
    @Override
    public void keyTyped(KeyEvent e) {
        // Not used
    }
    
    @Override
    public void keyPressed(KeyEvent e) {
        if (!gameOver) {
            if (e.getKeyCode() == KeyEvent.VK_SPACE) {
                if (player.isOnGround() || player.getJumpCount() < Player.MAX_JUMPS) {
                    player.jump();
                }
            }
        } else {
            if (e.getKeyCode() == KeyEvent.VK_R) {
                // Restart game
                score = 0;
                currentLevel = 1;
                obstaclesPassedThisLevel = 0;
                obstacles.clear();
                player = new Player(100, GROUND_Y, player.getSprite());
                gameOver = false;
                gameTimer.start();
            } else if (e.getKeyCode() == KeyEvent.VK_H) {
                parentFrame.showUserHistoryPanel();
            }
        }
    }
    
    @Override
    public void keyReleased(KeyEvent e) {
        // Not used
    }
}
