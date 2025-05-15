package ElementalRun;

import javax.swing.*;
import java.awt.*;
import java.awt.event.KeyEvent;

public class GameFrame extends JFrame {
    private LoginRegistrationPanel loginPanel;
    private UserHistoryPanel historyPanel;
    private PlayerSelectionPanel playerSelectionPanel;
    private ElementalRun gamePanel;
    private JPanel currentPanel;
    
    public GameFrame() {
        initializeFrame();
        showLoginPanel();
    }
    
    private void initializeFrame() {
        setTitle("ElementalRun");
        setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        setResizable(false);
        setLayout(new BorderLayout());
    }
    
    public void showLoginPanel() {
        if (currentPanel != null) {
            remove(currentPanel);
        }
        
        loginPanel = new LoginRegistrationPanel(this);
        currentPanel = loginPanel;
        add(currentPanel, BorderLayout.CENTER);
        
        pack();
        setLocationRelativeTo(null);
        revalidate();
        repaint();
    }
    
    public void showUserHistoryPanel() {
        if (currentPanel != null) {
            remove(currentPanel);
        }
        
        historyPanel = new UserHistoryPanel(this);
        currentPanel = historyPanel;
        add(currentPanel, BorderLayout.CENTER);
        
        pack();
        setLocationRelativeTo(null);
        revalidate();
        repaint();
    }
    
    public void showPlayerSelectionPanel() {
        if (currentPanel != null) {
            remove(currentPanel);
        }
        
        playerSelectionPanel = new PlayerSelectionPanel(this);
        currentPanel = playerSelectionPanel;
        add(currentPanel, BorderLayout.CENTER);
        
        pack();
        setLocationRelativeTo(null);
        revalidate();
        repaint();
    }
    
    public void startGame(Player.Sprite sprite) {
        if (currentPanel != null) {
            remove(currentPanel);
        }
        
        gamePanel = new ElementalRun(this, sprite);
        currentPanel = gamePanel;
        add(currentPanel, BorderLayout.CENTER);
        
        pack();
        setLocationRelativeTo(null);
        revalidate();
        repaint();
        gamePanel.requestFocus();
    }
    
    public void gameEnded(int finalScore) {
        // Save the game session
        UserManager.getInstance().saveUserGameSession(finalScore);
        
        // Show game over dialog with options
        String[] options = {"Play Again", "View History", "Logout"};
        int choice = JOptionPane.showOptionDialog(
            this,
            "Game Over! Final Score: " + finalScore + "\nWhat would you like to do?",
            "Game Over",
            JOptionPane.YES_NO_CANCEL_OPTION,
            JOptionPane.QUESTION_MESSAGE,
            null,
            options,
            options[0]
        );
        
        switch (choice) {
            case 0: // Play Again
                showPlayerSelectionPanel();
                break;
            case 1: // View History
                historyPanel.refreshHistory();
                showUserHistoryPanel();
                break;
            case 2: // Logout
                UserManager.getInstance().logoutUser();
                showLoginPanel();
                break;
            default:
                showUserHistoryPanel();
                break;
        }
    }
    
    public static void main(String[] args) {
        SwingUtilities.invokeLater(() -> {
            try {
                UIManager.setLookAndFeel(UIManager.getSystemLookAndFeelClassName());
            } catch (Exception e) {
                // Use default look and feel
            }
            new GameFrame().setVisible(true);
        });
    }
}