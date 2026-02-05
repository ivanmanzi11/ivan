// AttendanceMixin
mixin AttendanceMixin {
  int attendance = 0;
  void markAttendance() {
    attendance++;
  }
}

// Student uses AttendanceMixin
class Student with AttendanceMixin {
  String name;
  Student(this.name);
}

void main() {
  Student student1 = Student("Bertin");
  student1.markAttendance();
  student1.markAttendance();
  student1.markAttendance();
  print("Attendance: ${student1.attendance}");
}
