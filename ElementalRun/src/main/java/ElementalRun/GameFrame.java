package ElementalRun;

import javax.swing.*;
import java.awt.*;

public class GameFrame extends JFrame {
    private LoginRegistrationPanel loginPanel;
    private UserHistoryPanel historyPanel;
    private PlayerSelectionPanel playerSelectionPanel;
    private BackgroundSelectionPanel backgroundSelectionPanel;
    private ElementalRun gamePanel;
    private InstructionPanel instructionPanel;

    private JPanel currentPanel;

    private Player.Sprite selectedSprite;
    private String selectedBackgroundPath;

    public GameFrame() {
        initializeFrame();
        showLoginPanel();
    }

    private void initializeFrame() {
        setTitle("ElementalRun");
        setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        setResizable(true); // Allow maximizing and resizing
        setLayout(new BorderLayout());
    }

    public void showLoginPanel() {
        if (currentPanel != null) remove(currentPanel);

        loginPanel = new LoginRegistrationPanel(this);
        currentPanel = loginPanel;
        add(currentPanel, BorderLayout.CENTER);

        pack();
        setLocationRelativeTo(null);
        revalidate();
        repaint();
    }

    public void showUserHistoryPanel() {
        if (currentPanel != null) remove(currentPanel);

        historyPanel = new UserHistoryPanel(this);
        currentPanel = historyPanel;
        add(currentPanel, BorderLayout.CENTER);

        pack();
        setLocationRelativeTo(null);
        revalidate();
        repaint();
    }

    public void showInstructionPanel() {
        if (currentPanel != null) remove(currentPanel);

        instructionPanel = new InstructionPanel(this);
        currentPanel = instructionPanel;
        add(currentPanel, BorderLayout.CENTER);

        pack();
        setLocationRelativeTo(null);
        revalidate();
        repaint();
    }

    public void showPlayerSelectionPanel() {
        if (currentPanel != null) remove(currentPanel);

        playerSelectionPanel = new PlayerSelectionPanel(this);
        currentPanel = playerSelectionPanel;
        add(currentPanel, BorderLayout.CENTER);

        pack();
        setLocationRelativeTo(null);
        revalidate();
        repaint();
    }

    public void showBackgroundSelectionPanel(Player.Sprite selectedSprite) {
        this.selectedSprite = selectedSprite;

        if (currentPanel != null) remove(currentPanel);

        backgroundSelectionPanel = new BackgroundSelectionPanel(this);
        currentPanel = backgroundSelectionPanel;
        add(currentPanel, BorderLayout.CENTER);

        pack();
        setLocationRelativeTo(null);
        revalidate();
        repaint();
    }

    public void startGame(String selectedBackgroundPath) {
        this.selectedBackgroundPath = selectedBackgroundPath;

        if (currentPanel != null) remove(currentPanel);

        gamePanel = new ElementalRun(this, selectedSprite, selectedBackgroundPath);
        currentPanel = gamePanel;
        add(currentPanel, BorderLayout.CENTER);

        pack();
        setLocationRelativeTo(null);
        revalidate();
        repaint();
        gamePanel.requestFocus();
    }

    public void gameEnded(int finalScore, int finalLevel, int obstaclesJumped) {
        UserManager.getInstance().saveUserGameSession(finalScore, finalLevel, obstaclesJumped);

        String[] options = {"Play Again", "View History", "Logout"};
        int choice = JOptionPane.showOptionDialog(
                this,
                "Game Over! Final Score: " + finalScore +
                        "\nLevel Reached: " + finalLevel +
                        "\nObstacles Jumped: " + obstaclesJumped +
                        "\nWhat would you like to do?",
                "Game Over",
                JOptionPane.YES_NO_CANCEL_OPTION,
                JOptionPane.QUESTION_MESSAGE,
                null,
                options,
                options[0]
        );

        switch (choice) {
            case 0 -> showInstructionPanel(); // Show instructions before game restarts
            case 1 -> {
                historyPanel.refreshHistory();
                showUserHistoryPanel();
            }
            case 2 -> {
                UserManager.getInstance().logoutUser();
                showLoginPanel();
            }
            default -> showUserHistoryPanel();
        }
    }

    public static void main(String[] args) {
        SwingUtilities.invokeLater(() -> {
            try {
                UIManager.setLookAndFeel(UIManager.getSystemLookAndFeelClassName());
            } catch (Exception ignored) {}
            GameFrame frame = new GameFrame();
            frame.setExtendedState(JFrame.MAXIMIZED_BOTH); // Start maximized
            frame.setVisible(true);
        });
    }
}
