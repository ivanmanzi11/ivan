package ElementalRun;

import java.util.Date;

public class GameHistory {
    private int score;
    private int gamesPlayed;
    private Date playDate;
    
    public GameHistory(int score, int gamesPlayed) {
        this.score = score;
        this.gamesPlayed = gamesPlayed;
        this.playDate = new Date();
    }
    
    public int getScore() {
        return score;
    }
    
    public int getGamesPlayed() {
        return gamesPlayed;
    }
    
    public Date getPlayDate() {
        return playDate;
    }
    
    @Override
    public String toString() {
        return String.format("Score: %d, Date: %s", score, playDate.toString());
    }
}