package ElementalRun;

import java.awt.*;

public class Obstacle {
    public static final int OBSTACLE_WIDTH = 30;
    public static final int BASE_SPEED = 5;

    private int x, y;
    private int height;
    private int speed;
    private boolean hasBeenJumped = false; // NEW FIELD

    public Obstacle(int startX, int startY, int obstacleHeight, int speed) {
        this.x = startX;
        this.y = startY;
        this.height = obstacleHeight;
        this.speed = speed;
    }

    public void update() {
        x -= speed;
    }

    public void draw(Graphics g) {
        g.setColor(Color.DARK_GRAY);
        g.fillRect(x, y, OBSTACLE_WIDTH, height);

        g.setColor(Color.GRAY);
        g.drawRect(x, y, OBSTACLE_WIDTH, height);
        g.drawLine(x + 5, y, x + 5, y + height);
        g.drawLine(x + 15, y, x + 15, y + height);
        g.drawLine(x + 25, y, x + 25, y + height);
    }

    public int getX() { return x; }
    public int getY() { return y; }
    public int getWidth() { return OBSTACLE_WIDTH; }
    public int getHeight() { return height; }

    // 🚀 New Methods
    public boolean hasBeenJumped() {
        return hasBeenJumped;
    }

    public void setJumped() {
        hasBeenJumped = true;
    }
}
