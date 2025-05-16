package ElementalRun;

import java.awt.*;
import java.awt.image.BufferedImage;
import java.io.File;
import java.io.IOException;
import java.io.InputStream;
import javax.imageio.ImageIO;
import javax.swing.ImageIcon;

public class Player {

    public static final int PLAYER_SIZE = 40;
    private static final int GRAVITY = 1;
    static final int MAX_JUMPS = 3;

    void setGroundY(int i) {
        throw new UnsupportedOperationException("Not supported yet."); // Generated from nbfs://nbhost/SystemFileSystem/Templates/Classes/Code/GeneratedMethodBody
    }

    void updateGroundLevel(int i) {
        throw new UnsupportedOperationException("Not supported yet."); // Generated from nbfs://nbhost/SystemFileSystem/Templates/Classes/Code/GeneratedMethodBody
    }

    public enum Sprite {
        CAR, BICYCLE, PERSON
    }

    private int x, y;
    private int velocityY;
    private boolean onGround;
    private int groundY;
    private int jumpCount;
    private int jumpStrength;
    private Sprite sprite;
    private BufferedImage carImage, bicycleImage, personImage;

    public Player(int startX, int groundLevel, Sprite sprite) {
        this.x = startX;
        this.groundY = groundLevel - PLAYER_SIZE;
        this.y = groundY;
        this.velocityY = 0;
        this.onGround = true;
        this.jumpCount = 0;
        this.jumpStrength = -18;
        this.sprite = sprite;
        loadImages();
    }

    private void loadImages() {
        /* try {
            // Create an ImageIcon object
            ImageIcon icon = new ImageIcon("C:\\Users\\USER\\Documents\\NetBeansProjects\\planeshooter\\src\\main\\java\\assets\\enemyPlane1.png");
            
            // Extract the Image from the ImageIcon
            Image img = icon.getImage();
            
            if (img == null) {
                System.err.println("Failed to load enemy image");
                image = null;
            } else {
                // Create a new BufferedImage from the Image to manipulate it
                image = new BufferedImage(img.getWidth(null), img.getHeight(null), BufferedImage.TYPE_INT_ARGB);
                
                // Create an AffineTransform for rotating the image
                AffineTransform transform = new AffineTransform();
                
                // Rotate 90 degrees clockwise to face right
                // First, translate to origin
                transform.translate(img.getWidth(null) / 2, img.getHeight(null) / 2);
                // Then rotate -90 degrees (clockwise)
                transform.rotate(Math.PI / 2);
                // Then translate back
                transform.translate(-img.getHeight(null) / 2, -img.getWidth(null) / 2);
                
                // Create a new BufferedImage with swapped dimensions for the rotated image
                BufferedImage rotatedImage = new BufferedImage(
                    img.getHeight(null), img.getWidth(null), BufferedImage.TYPE_INT_ARGB);
                
                // Draw the rotated image
                Graphics2D g = rotatedImage.createGraphics();
                g.drawImage(img, transform, null);
                g.dispose();
                
                // Set the rotated image as our enemy image
                image = rotatedImage;
            }*/
        try {
            carImage = loadImage("C:\\Users\\USER\\Documents\\NetBeansProjects\\ElementalRun\\src\\main\\java\\Assets\\rabbit.png");
            bicycleImage = loadImage("C:\\Users\\USER\\Documents\\NetBeansProjects\\ElementalRun\\src\\main\\java\\Assets\\kangaroo.png");
            personImage = loadImage("C:\\Users\\USER\\Documents\\NetBeansProjects\\ElementalRun\\src\\main\\java\\Assets\\frog.png");
        } catch (IOException e) {
            System.err.println("Failed to load images: " + e.getMessage());
            // Fallback to default shapes
            carImage = new BufferedImage(80, 53, BufferedImage.TYPE_INT_ARGB);
            bicycleImage = new BufferedImage(60, 40, BufferedImage.TYPE_INT_ARGB);
            personImage = new BufferedImage(45, 40, BufferedImage.TYPE_INT_ARGB);
            Graphics2D g = carImage.createGraphics();
            g.setColor(Color.BLUE);
            g.fillRect(0, 0, 80, 53);
            g.dispose();
            g = bicycleImage.createGraphics();
            g.setColor(Color.BLUE);
            g.fillRect(0, 0, 60, 40);
            g.dispose();
            g = personImage.createGraphics();
            g.setColor(Color.BLUE);
            g.fillRect(0, 0, 45, 40);
            g.dispose();
        }
    }

    private BufferedImage loadImage(String path) throws IOException {
        try {
            // Try loading the image from the file path
            File file = new File(path);
            if (!file.exists()) {
                throw new IOException("File does not exist: " + path);
            }
            return ImageIO.read(file);
        } catch (IOException e) {
            System.err.println("Error loading image: " + path + " - " + e.getMessage());
            e.printStackTrace();  // Print the stack trace for more debugging details
            throw e;  // Re-throw the exception after logging the error
        }
    }

    public void increaseJumpStrength(int amount) {
        this.jumpStrength -= amount;
    }

    public void update() {
        if (!onGround) {
            velocityY += GRAVITY;
            y += velocityY;

            if (y >= groundY) {
                y = groundY;
                velocityY = 0;
                onGround = true;
                jumpCount = 0;
            }
        }
    }

    public void jump() {
        if (onGround || jumpCount < MAX_JUMPS) {
            velocityY = jumpStrength;
            onGround = false;
            jumpCount++;
        }
    }

    public void draw(Graphics g) {
        Graphics2D g2d = (Graphics2D) g;
        switch (sprite) {
            case CAR:
                g2d.drawImage(carImage, x, y, 80, 40, null);
                break;
            case BICYCLE:
                g2d.drawImage(bicycleImage, x, y, 40, 40, null);
                break;
            case PERSON:
                g2d.drawImage(personImage, x, y, 40, 40, null);
                break;
        }
    }

    public int getX() {
        return x;
    }

    public int getY() {
        return y;
    }

    public int getWidth() {
        switch (sprite) {
            case CAR:
                return 80;
            default:
                return 40;
        }
    }

    public int getHeight() {
        switch (sprite) {
            case CAR:
                return 40;
            default:
                return 40;
        }
    }

    public boolean isOnGround() {
        return onGround;
    }

    public int getJumpCount() {
        return jumpCount;
    }

    public Sprite getSprite() {
        return sprite;
    }
}
