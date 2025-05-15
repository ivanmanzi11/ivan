package ElementalRun;

import javax.swing.*;
import java.awt.*;
import java.awt.event.ActionEvent;

public class InstructionPanel extends JPanel {
    private final GameFrame parentFrame;

    public InstructionPanel(GameFrame parentFrame) {
        this.parentFrame = parentFrame;
        setLayout(new BorderLayout());
        setBackground(Color.CYAN);

        JLabel titleLabel = new JLabel("Game Instructions", SwingConstants.CENTER);
        titleLabel.setFont(new Font("Arial", Font.BOLD, 28));
        titleLabel.setBorder(BorderFactory.createEmptyBorder(20, 0, 10, 0));
        add(titleLabel, BorderLayout.NORTH);

        JTextArea instructions = new JTextArea();
        instructions.setText(
            "Welcome to ElementalRun!\n\n" +
            "🎮 How to Play:\n" +
            "1. Choose your player (Rabbit, Kangaroo, or Frog).\n" +
            "2. Choose a background theme (Earth, Fire, Water, Wind).\n" +
            "3. Press SPACE to jump — you can jump up to 3 times in a row.\n" +
            "4. Avoid all obstacles. Jump over them to survive.\n" +
            "5. Press 'P' to pause or resume the game.\n" +
            "6. View your game history and score trends after playing.\n\n" +
            "🧠 Tips:\n" +
            "- Each level becomes faster and harder.\n" +
            "- The more obstacles you jump, the higher your score.\n" +
            "- Practice makes perfect!\n\n" +
            "Good luck and have fun!"
        );
        instructions.setFont(new Font("Monospaced", Font.PLAIN, 16));
        instructions.setEditable(false);
        instructions.setLineWrap(true);
        instructions.setWrapStyleWord(true);
        instructions.setBackground(Color.WHITE);
        instructions.setBorder(BorderFactory.createEmptyBorder(10, 10, 10, 10));

        JScrollPane scrollPane = new JScrollPane(instructions);
        scrollPane.setBorder(BorderFactory.createEmptyBorder(10, 20, 10, 20));
        add(scrollPane, BorderLayout.CENTER);

        JButton continueButton = new JButton("Continue");
        continueButton.setFont(new Font("Arial", Font.BOLD, 16));
        continueButton.addActionListener((ActionEvent e) -> parentFrame.showPlayerSelectionPanel());

        JPanel bottomPanel = new JPanel();
        bottomPanel.setBackground(Color.CYAN);
        bottomPanel.add(continueButton);
        add(bottomPanel, BorderLayout.SOUTH);
    }
}
