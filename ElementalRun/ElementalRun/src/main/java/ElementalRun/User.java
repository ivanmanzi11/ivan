package ElementalRun;

import java.io.Serializable;
import java.util.ArrayList;
import java.util.List;

public class User implements Serializable {
    private static final long serialVersionUID = 1L;
    private String username;
    private String password;
    private List<GameHistory> gameHistory;
    private int bestScore;
    
    public User(String username, String password) {
        this.username = username;
        this.password = password;
        this.gameHistory = new ArrayList<>();
        this.bestScore = 0;
    }
    
    public String getUsername() {
        return username;
    }
    
    public String getPassword() {
        return password;
    }
    
    public List<GameHistory> getGameHistory() {
        return gameHistory;
    }
    
    public void addGameSession(int score, int gamesPlayed) {
        GameHistory history = new GameHistory(score, gamesPlayed);
        gameHistory.add(history);
        if (score > bestScore) {
            bestScore = score;
        }
    }
    
    public int getBestScore() {
        return bestScore;
    }
    
    public int getTotalGamesPlayed() {
        return gameHistory.size();
    }
    
    public double getAverageScore() {
        if (gameHistory.isEmpty()) return 0.0;
        int total = 0;
        for (GameHistory history : gameHistory) {
            total += history.getScore();
        }
        return (double) total / gameHistory.size();
    }
}
