// NotificationMixin
mixin NotificationMixin {
  void notify(String message) {
    print("Notification: $message");
  }
}

class Student with NotificationMixin {
  String name;

  Student(this.name);

  void registerCourse(String courseName) {
    print("$name has registered for $courseName");
    notify("You have successfully registered for $courseName");
  }
}

void main() {
  Student student1 = Student("Bertin");
  student1.registerCourse("Computer science");
}
