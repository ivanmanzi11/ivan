package ElementalRun;

import javax.swing.*;
import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

public class PlayerSelectionPanel extends JPanel {
    private final GameFrame parentFrame;

    public PlayerSelectionPanel(GameFrame parentFrame) {
        this.parentFrame = parentFrame;
        setLayout(new BorderLayout());
        setBackground(Color.CYAN);

        JLabel titleLabel = new JLabel("Choose Your Player", SwingConstants.CENTER);
        titleLabel.setFont(new Font("Arial", Font.BOLD, 36));
        add(titleLabel, BorderLayout.NORTH);

        JPanel selectionPanel = new JPanel(new GridLayout(1, 3, 20, 20));
        selectionPanel.setBackground(Color.CYAN);
        selectionPanel.setBorder(BorderFactory.createEmptyBorder(20, 20, 20, 20));

        JButton carButton = new JButton("Car");
        carButton.setFont(new Font("Arial", Font.BOLD, 18));
        carButton.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                parentFrame.showBackgroundSelectionPanel(Player.Sprite.CAR);
            }
        });
        selectionPanel.add(carButton);

        JButton bicycleButton = new JButton("Bicycle");
        bicycleButton.setFont(new Font("Arial", Font.BOLD, 18));
        bicycleButton.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                parentFrame.showBackgroundSelectionPanel(Player.Sprite.BICYCLE);
            }
        });
        selectionPanel.add(bicycleButton);

        JButton personButton = new JButton("Person");
        personButton.setFont(new Font("Arial", Font.BOLD, 18));
        personButton.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                parentFrame.showBackgroundSelectionPanel(Player.Sprite.PERSON);
            }
        });
        selectionPanel.add(personButton);

        add(selectionPanel, BorderLayout.CENTER);
    }
}
