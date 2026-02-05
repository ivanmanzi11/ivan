// Person class
class Person {
  String name;

  Person(this.name);

  void introduce() {
    print("My name is $name");
  }
}

// Student inherits from Person
class Student extends Person {
  int age;

  Student(String name, this.age) : super(name);
}

void main() {
  Student student1 = Student("Bertin", 22);
  student1.introduce();
}
