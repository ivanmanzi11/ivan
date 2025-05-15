package ElementalRun;

import javax.swing.*;
import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.text.SimpleDateFormat;

public class UserHistoryPanel extends JPanel {
    private final GameFrame parentFrame;
    private User currentUser;
    private JTextArea historyArea;
    
    public UserHistoryPanel(GameFrame parentFrame) {
        this.parentFrame = parentFrame;
        this.currentUser = UserManager.getInstance().getCurrentUser();
        initializeComponents();
        layoutComponents();
        updateHistoryDisplay();
    }
    
    private void initializeComponents() {
        historyArea = new JTextArea(15, 40);
        historyArea.setEditable(false);
        historyArea.setFont(new Font("Monospaced", Font.PLAIN, 12));
        historyArea.setBackground(Color.WHITE);
    }
    
    private void layoutComponents() {
        setLayout(new BorderLayout());
        setBackground(Color.CYAN);
        
        // Header panel
        JPanel headerPanel = new JPanel(new BorderLayout());
        headerPanel.setBackground(Color.CYAN);
        
        JLabel titleLabel = new JLabel("Player Statistics", SwingConstants.CENTER);
        titleLabel.setFont(new Font("Arial", Font.BOLD, 28));
        headerPanel.add(titleLabel, BorderLayout.NORTH);
        
        // User info
        JPanel userInfoPanel = new JPanel(new GridLayout(3, 1));
        userInfoPanel.setBackground(Color.CYAN);
        
        JLabel welcomeLabel = new JLabel("Welcome back, " + currentUser.getUsername() + "!", SwingConstants.CENTER);
        welcomeLabel.setFont(new Font("Arial", Font.BOLD, 18));
        userInfoPanel.add(welcomeLabel);
        
        JLabel bestScoreLabel = new JLabel("Best Score: " + currentUser.getBestScore(), SwingConstants.CENTER);
        bestScoreLabel.setFont(new Font("Arial", Font.PLAIN, 16));
        userInfoPanel.add(bestScoreLabel);
        
        JLabel avgScoreLabel = new JLabel(String.format("Average Score: %.1f", currentUser.getAverageScore()), SwingConstants.CENTER);
        avgScoreLabel.setFont(new Font("Arial", Font.PLAIN, 16));
        userInfoPanel.add(avgScoreLabel);
        
        headerPanel.add(userInfoPanel, BorderLayout.CENTER);
        add(headerPanel, BorderLayout.NORTH);
        
        // History display
        JScrollPane scrollPane = new JScrollPane(historyArea);
        scrollPane.setBorder(BorderFactory.createTitledBorder("Game History"));
        add(scrollPane, BorderLayout.CENTER);
        
        // Button panel
        JPanel buttonPanel = new JPanel(new FlowLayout());
        buttonPanel.setBackground(Color.CYAN);
        
        JButton startGameButton = new JButton("Start New Game");
        startGameButton.setFont(new Font("Arial", Font.BOLD, 16));
        startGameButton.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                parentFrame.showPlayerSelectionPanel();
            }
        });
        buttonPanel.add(startGameButton);
        
        JButton logoutButton = new JButton("Logout");
        logoutButton.setFont(new Font("Arial", Font.PLAIN, 14));
        logoutButton.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                UserManager.getInstance().logoutUser();
                parentFrame.showLoginPanel();
            }
        });
        buttonPanel.add(logoutButton);
        
        add(buttonPanel, BorderLayout.SOUTH);
    }
    
    private void updateHistoryDisplay() {
        StringBuilder sb = new StringBuilder();
        sb.append("Total Games Played: ").append(currentUser.getTotalGamesPlayed()).append("\n\n");
        sb.append("Recent Game History:\n");
        sb.append("====================\n");
        
        SimpleDateFormat sdf = new SimpleDateFormat("MMM dd, yyyy HH:mm");
        
        if (currentUser.getGameHistory().isEmpty()) {
            sb.append("No games played yet. Start playing to see your history!\n");
        } else {
            // Show last 10 games
            int startIndex = Math.max(0, currentUser.getGameHistory().size() - 10);
            for (int i = currentUser.getGameHistory().size() - 1; i >= startIndex; i--) {
                GameHistory history = currentUser.getGameHistory().get(i);
                sb.append(String.format("Score: %d | Date: %s\n", 
                    history.getScore(), sdf.format(history.getPlayDate())));
            }
        }
        
        historyArea.setText(sb.toString());
    }
    
    public void refreshHistory() {
        currentUser = UserManager.getInstance().getCurrentUser();
        updateHistoryDisplay();
    }
}
