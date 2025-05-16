package ElementalRun;

import java.io.Serializable;
import java.util.ArrayList;
import java.util.List;

public class User implements Serializable {
    private static final long serialVersionUID = 1L;

    private int userId;
    private String name;
    private String email;
    private String password;
    private int bestScore;
    private int currentLevel;
    private int totalObstaclesJumped;

    public User(String name, String email, String password) {
        this.name = name;
        this.email = email;
        this.password = password;
        this.bestScore = 0;
        this.currentLevel = 1;
        this.totalObstaclesJumped = 0;
    }

    // Getters and setters
    public int getUserId() { return userId; }
    public void setUserId(int userId) { this.userId = userId; }
    
    public String getName() { return name; }
    public String getEmail() { return email; }
    public String getPassword() { return password; }
    
    public int getBestScore() { return bestScore; }
    public void setBestScore(int bestScore) { this.bestScore = bestScore; }
    
    public int getCurrentLevel() { return currentLevel; }
    public void setCurrentLevel(int currentLevel) { this.currentLevel = currentLevel; }
    
    public int getTotalObstaclesJumped() { return totalObstaclesJumped; }
    public void setTotalObstaclesJumped(int totalObstaclesJumped) { 
        this.totalObstaclesJumped = totalObstaclesJumped; 
    }

    // These methods now just delegate to UserManager
    public List<GameHistory> getGameHistory() {
        return UserManager.getInstance().getGameHistoryForUser(this.userId);
    }

    public int getTotalGamesPlayed() {
        return getGameHistory().size();
    }

    public double getAverageScore() {
        List<GameHistory> history = getGameHistory();
        if (history.isEmpty()) return 0.0;
        
        int total = 0;
        for (GameHistory h : history) {
            total += h.getScore();
        }
        return (double) total / history.size();
    }

    
}