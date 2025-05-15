package ElementalRun;

import javax.swing.*;
import java.awt.*;
import java.awt.event.ActionEvent;

public class BackgroundSelectionPanel extends JPanel {
    private final GameFrame parentFrame;

    public BackgroundSelectionPanel(GameFrame parentFrame) {
        this.parentFrame = parentFrame;
        setLayout(new BorderLayout());
        setBackground(Color.CYAN);

        JLabel titleLabel = new JLabel("Choose your background", SwingConstants.CENTER);
        titleLabel.setFont(new Font("Arial", Font.BOLD, 30));
        add(titleLabel, BorderLayout.NORTH);

        JPanel selectionPanel = new JPanel(new GridLayout(2, 2, 20, 20));
        selectionPanel.setBackground(Color.CYAN);
        selectionPanel.setBorder(BorderFactory.createEmptyBorder(20, 20, 20, 20));

        addBackgroundButton(selectionPanel, "Earth", "C:\\Users\\USER\\Documents\\NetBeansProjects\\ElementalRun\\src\\main\\java\\Assets\\earth.png");
        addBackgroundButton(selectionPanel, "Fire", "C:\\Users\\USER\\Documents\\NetBeansProjects\\ElementalRun\\src\\main\\java\\Assets\\fire.png");
        addBackgroundButton(selectionPanel, "Water", "C:\\Users\\USER\\Documents\\NetBeansProjects\\ElementalRun\\src\\main\\java\\Assets\\water.png");
        addBackgroundButton(selectionPanel, "Wind", "C:\\Users\\USER\\Documents\\NetBeansProjects\\ElementalRun\\src\\main\\java\\Assets\\wind.png");

        add(selectionPanel, BorderLayout.CENTER);
    }

    private void addBackgroundButton(JPanel panel, String name, String imagePath) {
        JButton button = new JButton(name);
        button.setFont(new Font("Arial", Font.PLAIN, 18));
        button.addActionListener((ActionEvent e) -> parentFrame.startGame(imagePath));
        panel.add(button);
    }
}
