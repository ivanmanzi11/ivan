package ElementalRun;

import java.io.*;
import java.util.HashMap;
import java.util.Map;

public class UserManager {
    private static UserManager instance;
    private Map<String, User> users; // Keyed by email
    private User currentUser;
    private final String DATA_FILE = "users.dat";

    private UserManager() {
        users = new HashMap<>();
        loadUsers();
    }

    public static UserManager getInstance() {
        if (instance == null) {
            instance = new UserManager();
        }
        return instance;
    }

    public boolean registerUser(String name, String email, String password) {
        if (users.containsKey(email) || name.trim().isEmpty() || email.trim().isEmpty() || password.trim().isEmpty()) {
            return false;
        }

        User newUser = new User(name, email, password);
        users.put(email, newUser);
        saveUsers();
        return true;
    }

    public boolean loginUser(String email, String password) {
        User user = users.get(email);
        if (user != null && user.getPassword().equals(password)) {
            currentUser = user;
            return true;
        }
        return false;
    }

    public User getCurrentUser() {
        return currentUser;
    }

    public void logoutUser() {
        currentUser = null;
    }

    public void saveUserGameSession(int score) {
        if (currentUser != null) {
            currentUser.addGameSession(score, currentUser.getTotalGamesPlayed() + 1);
            saveUsers();
        }
    }

    @SuppressWarnings("unchecked")
    private void loadUsers() {
        try {
            File file = new File(DATA_FILE);
            if (file.exists()) {
                FileInputStream fis = new FileInputStream(file);
                ObjectInputStream ois = new ObjectInputStream(fis);
                users = (HashMap<String, User>) ois.readObject();
                ois.close();
                fis.close();
            }
        } catch (Exception e) {
            users = new HashMap<>();
        }
    }

    private void saveUsers() {
        try {
            FileOutputStream fos = new FileOutputStream(DATA_FILE);
            ObjectOutputStream oos = new ObjectOutputStream(fos);
            oos.writeObject(users);
            oos.close();
            fos.close();
        } catch (Exception e) {
            System.err.println("Error saving users: " + e.getMessage());
        }
    }
}
