package planeshooter;

import java.awt.image.BufferedImage;
import javax.swing.ImageIcon;
import java.awt.Graphics2D;
import java.awt.Image;
import java.awt.geom.AffineTransform;

public class Enemy {
    public int x, y;
    public BufferedImage image;
    
    public Enemy(int x, int y) {
        this.x = x;
        this.y = y;
        try {
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
            }
        } catch (Exception e) {
            System.err.println("Error loading enemy image: " + e.getMessage());
            e.printStackTrace();
            image = null;
        }
    }
}
