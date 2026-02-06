class Student {
  String name;
  int age;

  Student(this.name, this.age);
}

void main() {
  // Creation and use of Student's object
  Student student1 = Student("Bertin", 20);

  print("Student name: ${student1.name}");
  print("Student age: ${student1.age}");
}
