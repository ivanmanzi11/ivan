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
        
        // Title
        JLabel titleLabel = new JLabel("Choose Your Player", SwingConstants.CENTER);
        titleLabel.setFont(new Font("Arial", Font.BOLD, 36));
        add(titleLabel, BorderLayout.NORTH);
        
        // Selection panel
        JPanel selectionPanel = new JPanel(new GridLayout(1, 3, 20, 20));
        selectionPanel.setBackground(Color.CYAN);
        selectionPanel.setBorder(BorderFactory.createEmptyBorder(20, 20, 20, 20));
        
        // Car button
        JButton carButton = new JButton("Car");
        carButton.setFont(new Font("Arial", Font.BOLD, 18));
        carButton.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                parentFrame.startGame(Player.Sprite.CAR);
            }
        });
        selectionPanel.add(carButton);
        // Bicycle button
        JButton bicycleButton = new JButton("Bicycle");
        bicycleButton.setFont(new Font("Arial", Font.BOLD, 18));
        bicycleButton.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                parentFrame.startGame(Player.Sprite.BICYCLE);
            }
        });
        selectionPanel.add(bicycleButton);
        
        // Person button
        JButton personButton = new JButton("Person");
        personButton.setFont(new Font("Arial", Font.BOLD, 18));
        personButton.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                parentFrame.startGame(Player.Sprite.PERSON);
            }
        });
        selectionPanel.add(personButton);
        
        add(selectionPanel, BorderLayout.CENTER);
    }
}
