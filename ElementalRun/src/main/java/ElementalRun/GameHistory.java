package ElementalRun;

import java.util.Date;

public class GameHistory {
    private int score;
    private int level;
    private int obstaclesJumped;
    private Date playDate;
    
    public GameHistory(int score, int level, int obstaclesJumped, Date playDate) {
        this.score = score;
        this.level = level;
        this.obstaclesJumped = obstaclesJumped;
        this.playDate = playDate;
    }
    
    public int getScore() { return score; }
    public int getLevel() { return level; }
    public int getObstaclesJumped() { return obstaclesJumped; }
    public Date getPlayDate() { return playDate; }
    
    @Override
    public String toString() {
        return String.format("Score: %d, Level: %d, Obstacles: %d, Date: %s", 
            score, level, obstaclesJumped, playDate.toString());
    }
}