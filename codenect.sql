/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MariaDB
 Source Server Version : 100125
 Source Host           : localhost:3306
 Source Schema         : codenect1

 Target Server Type    : MariaDB
 Target Server Version : 100125
 File Encoding         : 65001

 Date: 12/06/2019 18:48:39
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin_user
-- ----------------------------
DROP TABLE IF EXISTS `admin_user`;
CREATE TABLE `admin_user`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of admin_user
-- ----------------------------
INSERT INTO `admin_user` VALUES (1, 'admin@gmail.com', 'admin123');

-- ----------------------------
-- Table structure for game_progress
-- ----------------------------
DROP TABLE IF EXISTS `game_progress`;
CREATE TABLE `game_progress`  (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `student_id` int(255) NOT NULL,
  `gametime` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `game_difficulty` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `game_status` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `game_progress` decimal(65, 0) NOT NULL,
  `game_mistakes` int(255) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `student_id`(`student_id`) USING BTREE,
  CONSTRAINT `game_progress_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 34 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of game_progress
-- ----------------------------
INSERT INTO `game_progress` VALUES (8, 1, '7165', 'c_novice', 'ongoing', 10, 4);
INSERT INTO `game_progress` VALUES (9, 1, '4049', 'c_intermediate', 'ongoing', 1, 2);
INSERT INTO `game_progress` VALUES (10, 1, '7389', 'c_advance', 'ongoing', 1, 1);
INSERT INTO `game_progress` VALUES (13, 1, '2', 'java_novice', 'ongoing', 0, 0);
INSERT INTO `game_progress` VALUES (14, 1, '180', 'java_intermediate', 'ongoing', 0, 0);
INSERT INTO `game_progress` VALUES (15, 1, '81', 'java_advance', 'ongoing', 0, 0);
INSERT INTO `game_progress` VALUES (22, 55, '0', 'c_novice', 'ongoing', 0, 0);
INSERT INTO `game_progress` VALUES (23, 55, '0', 'c_intermediate', 'ongoing', 0, 0);
INSERT INTO `game_progress` VALUES (24, 55, '0', 'c_advance', 'ongoing', 0, 0);
INSERT INTO `game_progress` VALUES (25, 55, '0', 'java_novice', 'ongoing', 0, 0);
INSERT INTO `game_progress` VALUES (26, 55, '0', 'java_intermediate', 'ongoing', 0, 0);
INSERT INTO `game_progress` VALUES (27, 55, '0', 'java_advance', 'ongoing', 0, 0);
INSERT INTO `game_progress` VALUES (28, 56, '1422', 'c_novice', 'ongoing', 2, 1);
INSERT INTO `game_progress` VALUES (29, 56, '482', 'c_intermediate', 'ongoing', 1, 2);
INSERT INTO `game_progress` VALUES (30, 56, '0', 'c_advance', 'ongoing', 0, 0);
INSERT INTO `game_progress` VALUES (31, 56, '0', 'java_novice', 'ongoing', 0, 0);
INSERT INTO `game_progress` VALUES (32, 56, '0', 'java_intermediate', 'ongoing', 0, 0);
INSERT INTO `game_progress` VALUES (33, 56, '0', 'java_advance', 'ongoing', 0, 0);

-- ----------------------------
-- Table structure for problem_solve
-- ----------------------------
DROP TABLE IF EXISTS `problem_solve`;
CREATE TABLE `problem_solve`  (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `student_id` int(255) NOT NULL,
  `quiz_id` int(255) NOT NULL,
  `mapTile` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `game_difficulty` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `quiz_id`(`quiz_id`) USING BTREE,
  INDEX `student_id`(`student_id`) USING BTREE,
  CONSTRAINT `problem_solve_ibfk_1` FOREIGN KEY (`quiz_id`) REFERENCES `quiz` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `problem_solve_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of problem_solve
-- ----------------------------
INSERT INTO `problem_solve` VALUES (1, 1, 28, '26', 'c_novice');
INSERT INTO `problem_solve` VALUES (2, 1, 26, '31', 'c_novice');
INSERT INTO `problem_solve` VALUES (3, 1, 21, '94', 'c_novice');
INSERT INTO `problem_solve` VALUES (4, 1, 2, '140', 'c_novice');
INSERT INTO `problem_solve` VALUES (5, 1, 23, '231', 'c_novice');
INSERT INTO `problem_solve` VALUES (6, 1, 20, '187', 'c_novice');
INSERT INTO `problem_solve` VALUES (7, 56, 26, '26', 'c_novice');
INSERT INTO `problem_solve` VALUES (8, 56, 2, '94', 'c_novice');
INSERT INTO `problem_solve` VALUES (9, 56, 9, '23', 'c_intermediate');

-- ----------------------------
-- Table structure for quiz
-- ----------------------------
DROP TABLE IF EXISTS `quiz`;
CREATE TABLE `quiz`  (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `difficulty` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `problem` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `choice1` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `choice2` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `choice3` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `answer` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `trivia` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `subject` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `example` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `output` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `requirement` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `hint` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 34 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of quiz
-- ----------------------------
INSERT INTO `quiz` VALUES (2, 'c_novice', 'Who invent C language?', 'Dennis Ritchie', 'John Doe', 'Bill Gates', 'Dennis Ritchie', 'C is a general-purpose, procedural, imperative computer programming language developed in 1972 by Dennis M. Ritchie at the Bell Telephone Laboratories to develop the UNIX operating system. C is the most widely used computer language. ', NULL, NULL, NULL, '', NULL);
INSERT INTO `quiz` VALUES (6, 'c_novice', 'What year C invented?', '1988', '1965', '1972', '1972', 'C is a general-purpose, procedural, imperative computer programming language developed in 1972 by Dennis M. Ritchie at the Bell Telephone Laboratories to develop the UNIX operating system. C is the most widely used computer language.', NULL, NULL, NULL, '', NULL);
INSERT INTO `quiz` VALUES (9, 'c_intermediate', 'print Hello World;', NULL, NULL, NULL, 'Hello World', 'In C programming language, printf() function is used to print the “character, string, float, integer, octal and hexadecimal values” onto the output screen.\nWe use printf() function with %d format specifier to display the value of an integer variable.\nSimilarly %c is used to display character, %f for float variable, %s for string variable, %lf for double and %x for hexadecimal variable.\nTo generate a newline,we use “\\n” in C printf() statement.', 'printf();', ' #include &lt; stdio.h &gt; int main() {    char ch = \'A\';    char str[20] = \"fresh2refresh.com\";    float flt = 10.234;    int no = 150;    double dbl = 20.123456;    printf(\"Character is %c \\n\", ch);    printf(\"String is %s \\n\" , str);    printf(\"Float value is %f \\n\", flt);    printf(\"Integer value is %d\\n\" , no);    printf(\"Double value is %lf \\n\", dbl);    printf(\"Octal value is %o \\n\", no);    printf(\"Hexadecimal value is %x \\n\", no);    return 0; }', ' Character is A String is fresh2refresh.com Float value is 10.234000 Integer value is 150 Double value is 20.123456 Octal value is 226 Hexadecimal value is 96', 'printf', NULL);
INSERT INTO `quiz` VALUES (11, 'c_novice', 'In a C program, what is the use of the semicolon(', 'Identifier', 'A string literal', 'Statement terminator', 'Statement terminator', 'In a C program, the semicolon is a statement terminator. That is, each individual statement must be ended with a semicolon. It indicates the end of one logical entity.', NULL, NULL, NULL, '', NULL);
INSERT INTO `quiz` VALUES (12, 'c_novice', 'It is a name used to identify a variable, function or any other user-defined item.', 'Comments', 'String', 'Identifier', 'Identifier', 'A C identifier is a name used to identify a variable, function, or any other user-defined item.', NULL, NULL, NULL, '', NULL);
INSERT INTO `quiz` VALUES (13, 'c_novice', 'What is the term used in C to describe blanks, tabs, newline characters and comments?', 'Space', 'Whitespace', 'Blanks', 'Whitespace', 'Whitespace is the term used in C to describe blanks, tabs, newline characters and comments. Whitespace separates one part of a statement from another and enables the compiler to identify where one element in a statement, such as int, ends and the next element begins.', NULL, NULL, NULL, '', NULL);
INSERT INTO `quiz` VALUES (14, 'c_novice', 'An extensive system used for declaring variables or function.', 'Constant', 'Loops', 'Data types', 'Data types', 'The type of a variable determines how much space it occupies in storage and how the bit pattern stored is interpreted.', NULL, NULL, NULL, '', NULL);
INSERT INTO `quiz` VALUES (15, 'c_novice', 'A data type that specifies that no value is available.', 'Void type', 'Floating-point type', 'Data type', 'Void type', 'The void type specifies that no value is available.', NULL, NULL, NULL, '', NULL);
INSERT INTO `quiz` VALUES (16, 'c_novice', 'It is a data type that can store numeric data.', 'Void types', 'Data types', 'Integer types', 'Integer types', 'Integer type can store numeric data.', NULL, NULL, NULL, '', NULL);
INSERT INTO `quiz` VALUES (17, 'c_novice', 'It is a data type that represent non-integer number with a decimal point.', 'Void types', 'Floating-point types', 'Integer types', 'Floating-point types', 'Floating-point types represent non-integer number with a decimal point.', NULL, NULL, NULL, '', NULL);
INSERT INTO `quiz` VALUES (18, 'c_novice', 'A name given to a storage area that programs can manipulate.', 'Variable', 'Operators', 'Functions', 'Variable', 'A variable is nothing but a name given to a storage area that our programs can manipulate. Each variable in C has a specific type, which determines the size and layout of the variable\'s memory; the range of values that can be stored within that memory; and the set of operations that can be applied to the variable.', NULL, NULL, NULL, '', NULL);
INSERT INTO `quiz` VALUES (20, 'c_novice', 'In Arithmetic Operators, what is the description of ', 'Increment operator increases the integer value by one	', 'Decrement operator decreases the integer value by one', 'Modulus Operator and remainder of after an integer division', 'Modulus Operator and remainder of after an integer division', 'An operator is a symbol that tells the compiler to perform specific mathematical or logical functions.', NULL, NULL, NULL, '', NULL);
INSERT INTO `quiz` VALUES (21, 'c_novice', 'What symbol in logical operators when both the operands are non-zero?', '||', '!', '&&', '&&', 'Logic operations include any operations that manipulate Boolean values.', NULL, NULL, NULL, '', NULL);
INSERT INTO `quiz` VALUES (22, 'c_novice', 'What symbol in logical operators  used to reverse the logical state of its operand?', '||', '!', '%', '!', 'Called Logical NOT Operator. It is used to reverse the logical state of its operand. If a condition is true, then Logical NOT operator will make it false.', NULL, NULL, NULL, '', NULL);
INSERT INTO `quiz` VALUES (23, 'c_novice', 'In Data types, what are the two(2) classifications of basic types?', 'Pointer types and Array types', 'Structure types and Pointer types', 'Integer types and Floating-point types', 'Integer types and Floating-point types', 'Basic types are arithmetic types.', NULL, NULL, NULL, '', NULL);
INSERT INTO `quiz` VALUES (24, 'c_novice', 'A single-precision floating point value', 'double', 'int', 'float', 'float', 'Float is a term is used in various programming languages to define a variable with a fractional value. Numbers created using a float variable declaration will have digits on both sides of a decimal point. ', NULL, NULL, NULL, '', NULL);
INSERT INTO `quiz` VALUES (25, 'c_novice', 'Represents the absence of type', 'double', 'void', 'float', 'void', 'The Void type, in several programming languages derived from C and Algol68, is the type for the result of a function that returns normally, but does not provide a result value to its caller. Usually such functions are called for their side effects, such as performing some task or writing to their output parameters.', NULL, NULL, NULL, '', NULL);
INSERT INTO `quiz` VALUES (26, 'c_novice', 'What is %s in C?', 'refers to a string', 'refers to an integer', 'refers to a character', 'refers to a string', '%s is used to format the output in C programming language. If we want to print a string, we use %s. It is called a format specifier.', NULL, NULL, NULL, '', NULL);
INSERT INTO `quiz` VALUES (27, 'c_novice', 'A pre-processing directive used to include the contents of a file into your program.', 'Syntax', 'Bit', 'header file', 'header file', 'A header file is a file with extension .h which contains C function declarations and macro definitions to be shared between several source files. There are two types of header files: the files that the programmer writes and the files that comes with your compiler.', NULL, NULL, NULL, '', NULL);
INSERT INTO `quiz` VALUES (28, 'c_novice', 'What is %d in C?', 'refers to a string', 'refers to an integer', 'refers to a character', 'refers to an integer', '%d is used to format the output in C programming language. If we want to print an integer, we use %d. It is called a format specifier.', NULL, NULL, NULL, '', NULL);
INSERT INTO `quiz` VALUES (29, 'c_advance', 'Create a function with a name of print_name() and print Hello World;', NULL, NULL, NULL, 'Hello World', 'A function is a group of statements that together perform a task. Every C program has at least one function, which is main(), and all the most trivial programs can define additional functions.', 'Function', '#include &lt; stdio.h &gt; <br> int main () { <br> names(); <br> } <br><br> names() { <br> printf(\"My Name is Harold\"); <br> }', 'My Name is Harold', 'print_name', 'function_name() {<br> //code here </br> }');
INSERT INTO `quiz` VALUES (33, 'java_advance', '', NULL, NULL, NULL, '', '', '', '', '', NULL, NULL);

-- ----------------------------
-- Table structure for student_user
-- ----------------------------
DROP TABLE IF EXISTS `student_user`;
CREATE TABLE `student_user`  (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `fname` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `mname` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `lname` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_date` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `teacher_id` int(255) NULL DEFAULT NULL,
  `age` int(40) NULL DEFAULT NULL,
  `birthdate` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `gender` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `educational_stats` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `school` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `email`(`email`) USING BTREE,
  INDEX `teacher_id`(`teacher_id`) USING BTREE,
  CONSTRAINT `student_user_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teacher_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 58 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of student_user
-- ----------------------------
INSERT INTO `student_user` VALUES (1, 'marwenvaleroso@gmail.com', 'marwen', 'aspe', 'valeroso', 'mreawn', '2019-03-18 08:50:57.689211', NULL, 21, '3/8/1998', 'male', 'college student', 'fsuu');
INSERT INTO `student_user` VALUES (55, 'mreawnvlrsaeoo@gmail.com', 'mreawn', '', '', 'mreawn123', '2019-03-19 12:26:29.236225', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `student_user` VALUES (56, '', 'erica', '', '', '123', '2019-03-19 17:37:20.988263', NULL, 0, '', '', '', '');
INSERT INTO `student_user` VALUES (57, 'jandyl@gmail.com', 'jandyl', '', '', 'jandyl123', '2019-05-20 10:05:18.192452', NULL, NULL, NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for teacher_students
-- ----------------------------
DROP TABLE IF EXISTS `teacher_students`;
CREATE TABLE `teacher_students`  (
  `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT,
  `teacher_id` int(255) NULL DEFAULT NULL,
  `student_id` int(255) NULL DEFAULT NULL,
  `timestamp` timestamp(6) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `student_id`(`student_id`) USING BTREE,
  INDEX `teacher_students_ibfk_1`(`teacher_id`) USING BTREE,
  CONSTRAINT `teacher_students_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teacher_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 64 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of teacher_students
-- ----------------------------
INSERT INTO `teacher_students` VALUES (57, 51, 55, NULL);
INSERT INTO `teacher_students` VALUES (61, 51, 56, NULL);
INSERT INTO `teacher_students` VALUES (63, 51, 1, NULL);

-- ----------------------------
-- Table structure for teacher_user
-- ----------------------------
DROP TABLE IF EXISTS `teacher_user`;
CREATE TABLE `teacher_user`  (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `fname` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `mname` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `lname` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_date` date NOT NULL,
  `school` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `occupation` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `gender` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `age` int(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `email`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 52 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of teacher_user
-- ----------------------------
INSERT INTO `teacher_user` VALUES (51, 'marwenvaleroso@gmail.com', 'mreawn', 'apse', 'vlrsaeoo', 'qwe', '0000-00-00', 'FSUU', 'teacher', 'male', 21);

SET FOREIGN_KEY_CHECKS = 1;
