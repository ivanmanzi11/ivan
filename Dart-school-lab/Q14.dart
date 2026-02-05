// Anonymous function to print student names
class Student {
  String name;
  int age;
  Student(this.name, this.age);
}

void main() {
  List<Student> students = [
    Student("Bwiza", 18),
    Student("Paul", 19),
    Student("Bertin", 20),
  ];

  // Anonymous function
  students.forEach((student) {
    print(student.name);
  });
}
