package ElementalRun;

import javax.swing.*;
import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

public class LoginRegistrationPanel extends JPanel {
    private JTextField nameField, emailField, regEmailField;
    private JPasswordField passwordField, regPasswordField;
    private JLabel messageLabel;
    private boolean loginSuccessful;
    private final GameFrame parentFrame;

    private JPanel loginPanel, registrationPanel;
    private CardLayout cardLayout;
    private JPanel cardsContainer;

    public LoginRegistrationPanel(GameFrame parentFrame) {
        this.parentFrame = parentFrame;
        this.loginSuccessful = false;

        initializeComponents();
        layoutComponents();
    }

    private void initializeComponents() {
        nameField = new JTextField(15);
        regEmailField = new JTextField(15);
        regPasswordField = new JPasswordField(15);
        emailField = new JTextField(15);
        passwordField = new JPasswordField(15);
        messageLabel = new JLabel(" ");
        messageLabel.setHorizontalAlignment(SwingConstants.CENTER);
        messageLabel.setFont(new Font("Arial", Font.PLAIN, 16));
    }

    private void layoutComponents() {
        setLayout(new BorderLayout());
        setBackground(Color.CYAN);

        JLabel titleLabel = new JLabel("ElementalRun", SwingConstants.CENTER);
        titleLabel.setFont(new Font("Arial", Font.BOLD, 36));
        add(titleLabel, BorderLayout.NORTH);

        cardLayout = new CardLayout();
        cardsContainer = new JPanel(cardLayout);
        cardsContainer.setBackground(Color.CYAN);

        loginPanel = createLoginPanel();
        registrationPanel = createRegistrationPanel();

        cardsContainer.add(registrationPanel, "register");
        cardsContainer.add(loginPanel, "login");

        add(cardsContainer, BorderLayout.CENTER);
        add(messageLabel, BorderLayout.SOUTH);

        cardLayout.show(cardsContainer, "register");
    }

    private JPanel createLoginPanel() {
        JPanel panel = new JPanel(new GridBagLayout());
        panel.setBackground(Color.WHITE);
        GridBagConstraints gbc = new GridBagConstraints();
        gbc.insets = new Insets(8, 8, 8, 8);
        gbc.anchor = GridBagConstraints.WEST;

        gbc.gridx = 0; gbc.gridy = 0;
        panel.add(new JLabel("Email:"), gbc);
        gbc.gridx = 1;
        panel.add(emailField, gbc);

        gbc.gridx = 0; gbc.gridy = 1;
        panel.add(new JLabel("Password:"), gbc);
        gbc.gridx = 1;
        panel.add(passwordField, gbc);

        gbc.gridx = 0; gbc.gridy = 2;
        gbc.gridwidth = 2;
        gbc.anchor = GridBagConstraints.CENTER;
        JButton loginButton = new JButton("Login");
        loginButton.addActionListener(new LoginActionListener());
        panel.add(loginButton, gbc);

        gbc.gridy = 3;
        JButton toRegister = new JButton("Don't have an account? Sign Up");
        toRegister.addActionListener(e -> switchTo("register"));
        panel.add(toRegister, gbc);

        return panel;
    }

    private JPanel createRegistrationPanel() {
        JPanel panel = new JPanel(new GridBagLayout());
        panel.setBackground(Color.WHITE);
        GridBagConstraints gbc = new GridBagConstraints();
        gbc.insets = new Insets(8, 8, 8, 8);
        gbc.anchor = GridBagConstraints.WEST;

        gbc.gridx = 0; gbc.gridy = 0;
        panel.add(new JLabel("Your Name:"), gbc);
        gbc.gridx = 1;
        panel.add(nameField, gbc);

        gbc.gridx = 0; gbc.gridy = 1;
        panel.add(new JLabel("Email:"), gbc);
        gbc.gridx = 1;
        panel.add(regEmailField, gbc);

        gbc.gridx = 0; gbc.gridy = 2;
        panel.add(new JLabel("Password:"), gbc);
        gbc.gridx = 1;
        panel.add(regPasswordField, gbc);

        gbc.gridx = 0; gbc.gridy = 3;
        gbc.gridwidth = 2;
        gbc.anchor = GridBagConstraints.CENTER;
        JButton registerButton = new JButton("Register");
        registerButton.addActionListener(new RegisterActionListener());
        panel.add(registerButton, gbc);

        gbc.gridy = 4;
        JButton toLogin = new JButton("Already have an account? Log In");
        toLogin.addActionListener(e -> switchTo("login"));
        panel.add(toLogin, gbc);

        return panel;
    }

    private void switchTo(String panelName) {
        clearFields();
        messageLabel.setText(" ");
        cardLayout.show(cardsContainer, panelName);
    }

    private void clearFields() {
        nameField.setText("");
        emailField.setText("");
        regEmailField.setText("");
        regPasswordField.setText("");
        passwordField.setText("");
    }

    private class LoginActionListener implements ActionListener {
        @Override
        public void actionPerformed(ActionEvent e) {
            String email = emailField.getText().trim();
            String password = new String(passwordField.getPassword());

            if (UserManager.getInstance().loginUser(email, password)) {
                messageLabel.setText("Login successful! Starting game...");
                messageLabel.setForeground(Color.GREEN);
                loginSuccessful = true;
                parentFrame.showUserHistoryPanel();
            } else {
                messageLabel.setText("Invalid email or password.");
                messageLabel.setForeground(Color.RED);
                passwordField.setText("");
            }
        }
    }

    private class RegisterActionListener implements ActionListener {
        @Override
        public void actionPerformed(ActionEvent e) {
            String name = nameField.getText().trim();
            String email = regEmailField.getText().trim();
            String password = new String(regPasswordField.getPassword());

            if (name.isEmpty() || email.isEmpty() || password.isEmpty()) {
                messageLabel.setText("All fields are required.");
                messageLabel.setForeground(Color.RED);
                return;
            }

            if (!isValidEmail(email)) {
                messageLabel.setText("Please enter a valid email address.");
                messageLabel.setForeground(Color.RED);
                return;
            }

            if (UserManager.getInstance().registerUser(name, email, password)) {
                messageLabel.setText("Registration successful! Please log in.");
                messageLabel.setForeground(Color.GREEN);
                switchTo("login");
            } else {
                messageLabel.setText("Email already registered.");
                messageLabel.setForeground(Color.RED);
            }
        }
    }

    private boolean isValidEmail(String email) {
        String emailRegex = "^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\\.[A-Za-z]{2,6}$";
        return email.matches(emailRegex);
    }

    public boolean isLoginSuccessful() {
        return loginSuccessful;
    }
}
