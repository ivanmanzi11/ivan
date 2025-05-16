package ElementalRun;

import javax.swing.*;
import java.awt.*;
import java.text.SimpleDateFormat;
import java.util.List;

public class UserHistoryPanel extends JPanel {
    private final GameFrame parentFrame;
    private User currentUser;
    private JTextArea historyArea;
    private JScrollPane scrollPane;
    private JPanel graphPanel;
    private JPanel centerCardPanel;
    private CardLayout centerCardLayout;
    private boolean showingGraph = false;

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

        scrollPane = new JScrollPane(historyArea);
        scrollPane.setBorder(BorderFactory.createTitledBorder("Game history"));

        graphPanel = new JPanel() {
            @Override
            protected void paintComponent(Graphics g) {
                super.paintComponent(g);
                drawScoreGraph(g);
            }
        };
        graphPanel.setPreferredSize(new Dimension(600, 300));
        graphPanel.setBackground(Color.WHITE);
        graphPanel.setBorder(BorderFactory.createTitledBorder("Score progression"));

        centerCardLayout = new CardLayout();
        centerCardPanel = new JPanel(centerCardLayout);
        centerCardPanel.add(scrollPane, "text");
        centerCardPanel.add(graphPanel, "graph");
    }

    private void layoutComponents() {
        setLayout(new BorderLayout());
        setBackground(Color.CYAN);

        JPanel headerPanel = new JPanel(new BorderLayout());
        headerPanel.setBackground(Color.CYAN);

        JLabel titleLabel = new JLabel("Player statistics", SwingConstants.CENTER);
        titleLabel.setFont(new Font("Arial", Font.BOLD, 28));
        headerPanel.add(titleLabel, BorderLayout.NORTH);

        JPanel userInfoPanel = new JPanel(new GridLayout(3, 1));
        userInfoPanel.setBackground(Color.CYAN);

        JLabel welcomeLabel = new JLabel("Welcome back, " + currentUser.getName(), SwingConstants.CENTER);
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

        add(centerCardPanel, BorderLayout.CENTER);

        JPanel buttonPanel = new JPanel(new FlowLayout());
        buttonPanel.setBackground(Color.CYAN);

        JButton toggleViewButton = new JButton("Switch to Graph View");
        toggleViewButton.setFont(new Font("Arial", Font.PLAIN, 14));
        toggleViewButton.addActionListener(e -> {
            showingGraph = !showingGraph;
            centerCardLayout.show(centerCardPanel, showingGraph ? "graph" : "text");
            toggleViewButton.setText(showingGraph ? "Switch to text view" : "Switch to graph view");
            if (showingGraph) graphPanel.repaint();
        });
        buttonPanel.add(toggleViewButton);

        JButton startGameButton = new JButton("Start new game");
        startGameButton.setFont(new Font("Arial", Font.BOLD, 14));
        startGameButton.addActionListener(e -> parentFrame.showInstructionPanel());
        buttonPanel.add(startGameButton);

        JButton logoutButton = new JButton("Logout");
        logoutButton.setFont(new Font("Arial", Font.PLAIN, 14));
        logoutButton.addActionListener(e -> {
            UserManager.getInstance().logoutUser();
            parentFrame.showLoginPanel();
        });
        buttonPanel.add(logoutButton);

        add(buttonPanel, BorderLayout.SOUTH);
    }

    private void updateHistoryDisplay() {
        StringBuilder sb = new StringBuilder();
        sb.append("Total games played: ").append(currentUser.getTotalGamesPlayed()).append("\n\n");
        sb.append("Recent game history:\n");
        sb.append("====================\n");

        SimpleDateFormat sdf = new SimpleDateFormat("MMM dd, yyyy HH:mm");

        List<GameHistory> historyList = currentUser.getGameHistory();
        if (historyList.isEmpty()) {
            sb.append("No games played yet. Start playing to see your history!\n");
        } else {
            int startIndex = Math.max(0, historyList.size() - 10);
            for (int i = historyList.size() - 1; i >= startIndex; i--) {
                GameHistory history = historyList.get(i);
                sb.append(String.format("Score: %d | Date: %s\n",
                        history.getScore(), sdf.format(history.getPlayDate())));
            }
        }

        historyArea.setText(sb.toString());
    }

    private void drawScoreGraph(Graphics g) {
        List<GameHistory> historyList = currentUser.getGameHistory();
        if (historyList.size() < 2) {
            g.setColor(Color.BLACK);
            g.drawString("Play more games to see a graph!", 10, 20);
            return;
        }

        int width = graphPanel.getWidth();
        int height = graphPanel.getHeight();
        int padding = 40;
        int pointRadius = 5;

        int maxScore = historyList.stream().mapToInt(GameHistory::getScore).max().orElse(100);
        int minScore = historyList.stream().mapToInt(GameHistory::getScore).min().orElse(0);
        int range = Math.max(maxScore - minScore, 1);
        double avgScore = historyList.stream().mapToInt(GameHistory::getScore).average().orElse(0);

        int graphWidth = width - 2 * padding;
        int graphHeight = height - 2 * padding;
        int n = historyList.size();
        int stepX = n > 1 ? graphWidth / (n - 1) : graphWidth;

        g.setColor(Color.DARK_GRAY);
        g.drawLine(padding, height - padding, width - padding, height - padding);
        g.drawLine(padding, padding, padding, height - padding);

        int[] xPoints = new int[n];
        int[] yPoints = new int[n];

        for (int i = 0; i < n; i++) {
            int score = historyList.get(i).getScore();
            int x = padding + i * stepX;
            int y = height - padding - (int) ((double)(score - minScore) / range * graphHeight);

            xPoints[i] = x;
            yPoints[i] = y;

            g.setColor(Color.BLUE);
            g.fillOval(x - pointRadius, y - pointRadius, 2 * pointRadius, 2 * pointRadius);

            g.setColor(Color.BLACK);
            g.setFont(new Font("Arial", Font.PLAIN, 10));
            g.drawString(String.valueOf(score), x - 10, y - 8);
        }

        g.setColor(new Color(0, 120, 220));
        for (int i = 0; i < n - 1; i++) {
            g.drawLine(xPoints[i], yPoints[i], xPoints[i + 1], yPoints[i + 1]);
        }

        g.setColor(Color.ORANGE);
        int avgY = height - padding - (int) ((avgScore - minScore) / range * graphHeight);
        g.drawLine(padding, avgY, width - padding, avgY);
        g.setFont(new Font("Arial", Font.ITALIC, 12));
        g.drawString("Avg: " + String.format("%.1f", avgScore), padding + 5, avgY - 5);

        g.setColor(Color.BLACK);
        g.drawString("Game scores", padding, padding - 10);
    }

    public void refreshHistory() {
        currentUser = UserManager.getInstance().getCurrentUser();
        updateHistoryDisplay();
        graphPanel.repaint();
    }
}
