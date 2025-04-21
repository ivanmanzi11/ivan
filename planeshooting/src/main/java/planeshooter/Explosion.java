package planeshooter;

import java.awt.Color;
import java.awt.Graphics;
import java.awt.Image;
import javax.swing.ImageIcon;

public class Explosion {
    private int x, y;
    private int currentFrame = 0;
    private int maxFrames = 10; // Number of frames to show the explosion
    private int radius = 20; // Starting radius
    private boolean finished = false;
    
    public Explosion(int x, int y) {
        this.x = x;
        this.y = y;
    }
    
    public void update() {
        currentFrame++;
        radius += 2; // Make the explosion grow
        if (currentFrame >= maxFrames) {
            finished = true;
        }
    }
    
    public void draw(Graphics g) {
        if (!finished) {
            // Create a simple red circle explosion effect
            int alpha = 255 - (currentFrame * 25); // Fade out over time
            if (alpha < 0) alpha = 0;
            
            // Draw the explosion (red circle that grows and fades)
            g.setColor(new Color(255, 100, 0, alpha));
            g.fillOval(x - radius/2, y - radius/2, radius, radius);
            
            // Add some yellow in the center
            g.setColor(new Color(255, 200, 0, alpha/2));
            g.fillOval(x - radius/4, y - radius/4, radius/2, radius/2);
        }
    }
    
    public boolean isFinished() {
        return finished;
    }
}