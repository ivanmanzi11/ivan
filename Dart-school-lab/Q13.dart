// Map with student ID as key and Student as value
class Student {
  String name;
  int age;
  Student(this.name, this.age);
}

void main() {
  Map<int, Student> students = {
    1: Student("Paul", 20),
    2: Student("Bwiza", 22),
    3: Student("Bertin", 19),
  };

  // Print all student names
  for (Student student in students.values) {
    print(student.name);
  }
}
