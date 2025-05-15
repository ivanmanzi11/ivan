package ElementalRun;

import java.awt.*;

public class CollisionDetector {
    
    public static boolean checkCollision(Player player, Obstacle obstacle) {
        Rectangle playerRect = new Rectangle(
                player.getX(),
                player.getY(),
                player.getWidth(),
                player.getHeight()
        );
        
        Rectangle obstacleRect = new Rectangle(
            obstacle.getX(), 
            obstacle.getY(), 
            obstacle.getWidth(), 
            obstacle.getHeight()
        );
        
        return playerRect.intersects(obstacleRect);
    }
}
