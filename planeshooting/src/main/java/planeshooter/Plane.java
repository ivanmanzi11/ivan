package planeshooter;

import java.awt.Image;
import javax.swing.ImageIcon;

public class Plane {
    public int x, y;
    public Image image;

    public Plane(int x, int y) {
        this.x = x;
        this.y = y;
        try {
            // Load the image using ImageIcon
            ImageIcon img = new ImageIcon("C:\\Users\\USER\\Documents\\NetBeansProjects\\planeshooter\\src\\main\\java\\assets\\plane.png");
            image = img.getImage(); // Extract the Image from ImageIcon and assign to 'image'
            
            if (image == null) {
                System.err.println("Failed to load plane.png - Image might be corrupted");
            }
        } catch (Exception e) {
            System.err.println("Error loading plane image: " + e.getMessage());
            e.printStackTrace();
            image = null;
        }
    }
}
