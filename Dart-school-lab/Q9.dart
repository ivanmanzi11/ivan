// Interface (abstract class)
abstract class Registrable {
  void registerCourse(String courseName);
}

// Student implements Registrable
class Student implements Registrable {
  String name;

  Student(this.name);

  @override
  void registerCourse(String courseName) {
    print("$name has registered for $courseName");
  }
}

void main() {
  Student student1 = Student("John");
  student1.registerCourse("Computer science");
}
