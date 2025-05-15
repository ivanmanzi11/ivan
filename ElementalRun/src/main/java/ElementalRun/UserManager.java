package ElementalRun;

import java.sql.*;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

public class UserManager {
    private static UserManager instance;
    private Map<String, User> activeUsers;
    private User currentUser;
    private Connection connection;

    // Database configuration - UPDATE THESE VALUES!
    private static final String DB_URL = "jdbc:mysql://localhost:3306/elemental_run";
    private static final String DB_USER = "root";
    private static final String DB_PASSWORD = "";

    private UserManager() {
        activeUsers = new HashMap<>();
        initializeDatabaseConnection();
    }

    public static synchronized UserManager getInstance() {
        if (instance == null) {
            instance = new UserManager();
        }
        return instance;
    }

    private void initializeDatabaseConnection() {
        try {
            Class.forName("com.mysql.cj.jdbc.Driver");
            connection = DriverManager.getConnection(DB_URL, DB_USER, DB_PASSWORD);
            createTablesIfNotExists();
            System.out.println("Database connection established successfully");
        } catch (ClassNotFoundException e) {
            System.err.println("MySQL JDBC Driver not found: " + e.getMessage());
        } catch (SQLException e) {
            System.err.println("Database connection failed: " + e.getMessage());
        }
    }

    private void createTablesIfNotExists() throws SQLException {
        String createUsersTable = "CREATE TABLE IF NOT EXISTS users (" +
                "user_id INT AUTO_INCREMENT PRIMARY KEY, " +
                "name VARCHAR(100) NOT NULL, " +
                "email VARCHAR(100) NOT NULL UNIQUE, " +
                "password VARCHAR(255) NOT NULL, " +
                "created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP)";

        String createScoresTable = "CREATE TABLE IF NOT EXISTS game_scores (" +
                "score_id INT AUTO_INCREMENT PRIMARY KEY, " +
                "user_id INT NOT NULL, " +
                "score INT NOT NULL, " +
                "level INT NOT NULL DEFAULT 1, " +
                "obstacles_jumped INT NOT NULL DEFAULT 0, " +
                "play_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP, " +
                "FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE)";

        try (Statement stmt = connection.createStatement()) {
            stmt.execute(createUsersTable);
            stmt.execute(createScoresTable);
        }
    }

    public boolean registerUser(String name, String email, String password) {
        if (connection == null) {
            System.err.println("Database connection not established");
            return false;
        }

        try {
            // Check if email exists
            String checkSql = "SELECT email FROM users WHERE email = ?";
            try (PreparedStatement checkStmt = connection.prepareStatement(checkSql)) {
                checkStmt.setString(1, email);
                try (ResultSet rs = checkStmt.executeQuery()) {
                    if (rs.next()) {
                        return false; // Email already exists
                    }
                }
            }

            // Insert new user
            String insertSql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
            try (PreparedStatement insertStmt = connection.prepareStatement(insertSql, Statement.RETURN_GENERATED_KEYS)) {
                insertStmt.setString(1, name);
                insertStmt.setString(2, email);
                insertStmt.setString(3, password);
                
                int affectedRows = insertStmt.executeUpdate();
                if (affectedRows > 0) {
                    try (ResultSet generatedKeys = insertStmt.getGeneratedKeys()) {
                        if (generatedKeys.next()) {
                            int userId = generatedKeys.getInt(1);
                            User newUser = new User(name, email, password);
                            newUser.setUserId(userId);
                            activeUsers.put(email, newUser);
                            return true;
                        }
                    }
                }
                return false;
            }
        } catch (SQLException e) {
            System.err.println("Registration error: " + e.getMessage());
            return false;
        }
    }

    public boolean loginUser(String email, String password) {
        if (connection == null) {
            System.err.println("Database connection not established");
            return false;
        }

        try {
            String sql = "SELECT user_id, name, email FROM users WHERE email = ? AND password = ?";
            try (PreparedStatement stmt = connection.prepareStatement(sql)) {
                stmt.setString(1, email);
                stmt.setString(2, password);
                
                try (ResultSet rs = stmt.executeQuery()) {
                    if (rs.next()) {
                        int userId = rs.getInt("user_id");
                        String name = rs.getString("name");
                        String userEmail = rs.getString("email");
                        
                        User user = new User(name, userEmail, password);
                        user.setUserId(userId);
                        user.setBestScore(getBestScoreForUser(userId));
                        
                        currentUser = user;
                        activeUsers.put(email, user);
                        return true;
                    }
                }
            }
            return false;
        } catch (SQLException e) {
            System.err.println("Login error: " + e.getMessage());
            return false;
        }
    }

    public User getCurrentUser() {
        return currentUser;
    }

    public void logoutUser() {
        if (currentUser != null) {
            activeUsers.remove(currentUser.getEmail());
            currentUser = null;
        }
    }

    public void saveUserGameSession(int score, int level, int obstaclesJumped) {
        if (currentUser == null || connection == null) return;

        try {
            // Insert the game score
            String sql = "INSERT INTO game_scores (user_id, score, level, obstacles_jumped) VALUES (?, ?, ?, ?)";
            try (PreparedStatement stmt = connection.prepareStatement(sql)) {
                stmt.setInt(1, currentUser.getUserId());
                stmt.setInt(2, score);
                stmt.setInt(3, level);
                stmt.setInt(4, obstaclesJumped);
                stmt.executeUpdate();
            }

            // Update user's best score if this is higher
            if (score > currentUser.getBestScore()) {
                currentUser.setBestScore(score);
            }
        } catch (SQLException e) {
            System.err.println("Error saving game session: " + e.getMessage());
        }
    }

    public int getBestScoreForUser(int userId) {
        if (connection == null) return 0;

        try {
            String sql = "SELECT MAX(score) as best_score FROM game_scores WHERE user_id = ?";
            try (PreparedStatement stmt = connection.prepareStatement(sql)) {
                stmt.setInt(1, userId);
                try (ResultSet rs = stmt.executeQuery()) {
                    if (rs.next()) {
                        return rs.getInt("best_score");
                    }
                }
            }
            return 0;
        } catch (SQLException e) {
            System.err.println("Error getting best score: " + e.getMessage());
            return 0;
        }
    }

    public List<GameHistory> getGameHistoryForUser(int userId) {
        List<GameHistory> history = new ArrayList<>();
        if (connection == null) return history;

        try {
            String sql = "SELECT score, level, obstacles_jumped, play_date FROM game_scores " +
                         "WHERE user_id = ? ORDER BY play_date DESC LIMIT 10";
            try (PreparedStatement stmt = connection.prepareStatement(sql)) {
                stmt.setInt(1, userId);
                try (ResultSet rs = stmt.executeQuery()) {
                    while (rs.next()) {
                        int score = rs.getInt("score");
                        int level = rs.getInt("level");
                        int obstacles = rs.getInt("obstacles_jumped");
                        Timestamp playDate = rs.getTimestamp("play_date");
                        
                        GameHistory gameHistory = new GameHistory(score, level, obstacles, playDate);
                        history.add(gameHistory);
                    }
                }
            }
        } catch (SQLException e) {
            System.err.println("Error getting game history: " + e.getMessage());
        }
        return history;
    }

    public boolean isDatabaseConnected() {
        try {
            return connection != null && !connection.isClosed();
        } catch (SQLException e) {
            return false;
        }
    }
}