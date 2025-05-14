package ElementalRun;

import javax.swing.*;
import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

public class LoginRegistrationPanel extends JPanel {
    private JTextField usernameField;
    private JPasswordField passwordField;
    private JTextField regUsernameField;
    private JPasswordField regPasswordField;
    private JLabel messageLabel;
    private boolean loginSuccessful;
    private final GameFrame parentFrame;
    
    public LoginRegistrationPanel(GameFrame parentFrame) {
        this.parentFrame = parentFrame;
        this.loginSuccessful = false;
        initializeComponents();
        layoutComponents();
    }
    
    private void initializeComponents() {
        // Login components
        usernameField = new JTextField(15);
        passwordField = new JPasswordField(15);
        
        // Registration components
        regUsernameField = new JTextField(15);
        regPasswordField = new JPasswordField(15);
        
        messageLabel = new JLabel(" ");
        messageLabel.setHorizontalAlignment(SwingConstants.CENTER);
    }
    
    private void layoutComponents() {
        setLayout(new BorderLayout());
        setBackground(Color.CYAN);
        
        // Title
        JLabel titleLabel = new JLabel("ElementalRun", SwingConstants.CENTER);
        titleLabel.setFont(new Font("Arial", Font.BOLD, 36));
        add(titleLabel, BorderLayout.NORTH);
        
        // Main panel with login and registration
        JPanel mainPanel = new JPanel(new GridBagLayout());
        mainPanel.setBackground(Color.CYAN);
        GridBagConstraints gbc = new GridBagConstraints();
        
        // Login Section
        JPanel loginPanel = createLoginPanel();
        loginPanel.setBorder(BorderFactory.createTitledBorder("Login"));
        gbc.gridx = 0;
        gbc.gridy = 0;
        gbc.insets = new Insets(10, 10, 10, 10);
        mainPanel.add(loginPanel, gbc);
        
        // Registration Section
        JPanel registrationPanel = createRegistrationPanel();
        registrationPanel.setBorder(BorderFactory.createTitledBorder("New User Registration"));
        gbc.gridx = 1;
        gbc.gridy = 0;
        mainPanel.add(registrationPanel, gbc);
        
        add(mainPanel, BorderLayout.CENTER);
        
        // Message label
        messageLabel.setFont(new Font("Arial", Font.PLAIN, 16));
        add(messageLabel, BorderLayout.SOUTH);
    }
    
    private JPanel createLoginPanel() {
        JPanel panel = new JPanel(new GridBagLayout());
        panel.setBackground(Color.WHITE);
        GridBagConstraints gbc = new GridBagConstraints();
        
        gbc.insets = new Insets(5, 5, 5, 5);
        
        // Username
        gbc.gridx = 0; gbc.gridy = 0;
        gbc.anchor = GridBagConstraints.EAST;
        panel.add(new JLabel("Username:"), gbc);
        
        gbc.gridx = 1;
        gbc.anchor = GridBagConstraints.WEST;
        panel.add(usernameField, gbc);
        
        // Password
        gbc.gridx = 0; gbc.gridy = 1;
        gbc.anchor = GridBagConstraints.EAST;
        panel.add(new JLabel("Password:"), gbc);
        
        gbc.gridx = 1;
        gbc.anchor = GridBagConstraints.WEST;
        panel.add(passwordField, gbc);
        
        // Login button
        JButton loginButton = new JButton("Login");
        loginButton.addActionListener(new LoginActionListener());
        gbc.gridx = 0; gbc.gridy = 2;
        gbc.gridwidth = 2;
        gbc.anchor = GridBagConstraints.CENTER;
        panel.add(loginButton, gbc);
        
        return panel;
    }
    
    private JPanel createRegistrationPanel() {
        JPanel panel = new JPanel(new GridBagLayout());
        panel.setBackground(Color.WHITE);
        GridBagConstraints gbc = new GridBagConstraints();
        
        gbc.insets = new Insets(5, 5, 5, 5);
        
        // Username
        gbc.gridx = 0; gbc.gridy = 0;
        gbc.anchor = GridBagConstraints.EAST;
        panel.add(new JLabel("Username:"), gbc);
        
        gbc.gridx = 1;
        gbc.anchor = GridBagConstraints.WEST;
        panel.add(regUsernameField, gbc);
        
        // Password
        gbc.gridx = 0; gbc.gridy = 1;
        gbc.anchor = GridBagConstraints.EAST;
        panel.add(new JLabel("Password:"), gbc);
        
        gbc.gridx = 1;
        gbc.anchor = GridBagConstraints.WEST;
        panel.add(regPasswordField, gbc);
        
        // Register button
        JButton registerButton = new JButton("Register");
        registerButton.addActionListener(new RegisterActionListener());
        gbc.gridx = 0; gbc.gridy = 2;
        gbc.gridwidth = 2;
        gbc.anchor = GridBagConstraints.CENTER;
        panel.add(registerButton, gbc);
        
        return panel;
    }
    
    private class LoginActionListener implements ActionListener {
        @Override
        public void actionPerformed(ActionEvent e) {
            String username = usernameField.getText().trim();
            String password = new String(passwordField.getPassword());
            
            if (UserManager.getInstance().loginUser(username, password)) {
                messageLabel.setText("Login successful! Starting game...");
                messageLabel.setForeground(Color.GREEN);
                loginSuccessful = true;
                parentFrame.showUserHistoryPanel();
            } else {
                messageLabel.setText("Invalid username or password. Please try again.");
                messageLabel.setForeground(Color.RED);
                passwordField.setText("");
            }
        }
    }
    
    private class RegisterActionListener implements ActionListener {
        @Override
        public void actionPerformed(ActionEvent e) {
            String username = regUsernameField.getText().trim();
            String password = new String(regPasswordField.getPassword());
            
            if (username.isEmpty() || password.isEmpty()) {
                messageLabel.setText("Username and password cannot be empty.");
                messageLabel.setForeground(Color.RED);
                return;
            }
            
            if (UserManager.getInstance().registerUser(username, password)) {
                messageLabel.setText("Registration successful! You can now login.");
                messageLabel.setForeground(Color.GREEN);
                regUsernameField.setText("");
                regPasswordField.setText("");
            } else {
                messageLabel.setText("Username already exists. Please choose another.");
                messageLabel.setForeground(Color.RED);
                regPasswordField.setText("");
            }
        }
    }
    
    public boolean isLoginSuccessful() {
        return loginSuccessful;
    }
}
