-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2024 at 03:29 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sbpgc_olc`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'tuaha', 'syeedmdtuaha@gmail.com', '$2y$10$YOSHUaoxH84KHSdD4qG2luDf6gZhRFWmIzv7ifwdapVrxvELjmy0m'),
(2, 'Selina', 'selina@gmail.com', '$2y$10$FiVYEkPzHg2.KIBdiWn5JudzORmqFOUD2m6VI4c/oHfRClXuIjMVW'),
(3, 'abc', 'abc@gmail.com', '$2y$10$pxiXvPNcQX2afCsOlPu2v.gZl6z6XyUgbxP0y6Dq7CKpjRde.J1hy');

-- --------------------------------------------------------

--
-- Table structure for table `admin_course`
--

CREATE TABLE `admin_course` (
  `id` int(11) NOT NULL,
  `course_code` varchar(255) DEFAULT NULL,
  `course_title` varchar(255) DEFAULT NULL,
  `credit` varchar(255) DEFAULT NULL,
  `enroll_key` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_course`
--

INSERT INTO `admin_course` (`id`, `course_code`, `course_title`, `credit`, `enroll_key`) VALUES
(67, 'CSE-111', 'Introduction to Computer System', '3', 'ICS@##'),
(68, 'CSE-112', 'Programming Language', '3', 'PL@##'),
(69, 'CSE-113', 'Programming Language Practical', '1.5', 'PLP@##'),
(70, 'CSE-114', 'Physics (Electricity and Magnetism)', '3', 'P@##'),
(71, 'CSE-115 ', 'Differential Calculus Ordinate Geometry', '3', 'DCOG@##'),
(72, 'CSE-116 ', 'English', '3', 'E@##'),
(73, 'CSE-121 ', 'Data Structure', '3', 'DS@##'),
(74, 'CSE-122 ', 'Data Structure Practical', '1.5', 'DSP@##'),
(75, 'CSE-123  ', 'Introduction to Electrical Engineering', '3', 'IEE@##'),
(76, 'CSE-124 ', ' Introduction to Electrical Engineering Practical', '1.5', 'IEEP@##'),
(77, 'CSE-125', 'Integral Calculus and Differential Equation', '3', 'ICDE@##'),
(78, 'CSE-126', 'Statistics and Probability', '3', 'SP@##'),
(79, 'CSE-127', 'Discrete Mathematics', '3', 'DM@##'),
(80, 'CSE-211', 'Object Oriented Programming', '3', 'OOP@##'),
(81, 'CSE-212', 'OO Programming Language Practical', '1.5', 'OOPLP@##'),
(85, 'test-111', 'This is for testing purposes', '5', 'test@##');

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `id` int(11) NOT NULL,
  `teacher_name` varchar(255) DEFAULT NULL,
  `course_code` varchar(255) DEFAULT NULL,
  `assignment_no` varchar(255) DEFAULT NULL,
  `assign_instruction` text DEFAULT NULL,
  `pdf` varchar(255) DEFAULT NULL,
  `assign_sub_link` varchar(255) DEFAULT NULL,
  `section` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`id`, `teacher_name`, `course_code`, `assignment_no`, `assign_instruction`, `pdf`, `assign_sub_link`, `section`) VALUES
(43393, 'Sharmin Toa', 'CSE-111', 'ASN1', 'Please read the pdf carefully then answer the question... ', 'Assignemnt.pdf', 'https://www.youtube.com/watch?v=LxjlvRUixgE&list=PLDiW1Cf0a0bsZh6R5pCCbiUu60Pl47ZRt&index=2&ab_channel=MohammadShariq', 'A'),
(43399, 'Sharmin Toa', 'CSE-111', 'ASN1', 'Please read the pdf carefully then answer the question... ', 'Syeed-MD-Tuaha-Resume.pdf', 'https://www.youtube.com/watch?v=LxjlvRUixgE&list=PLDiW1Cf0a0bsZh6R5pCCbiUu60Pl47ZRt&index=2&ab_channel=MohammadShariq', 'B'),
(43400, 'Sharmin Toa', 'CSE-111', 'ASN1', 'This is your first assignment. Your mark will be considered. Try to answer all the questions..', 'Assignemnt.pdf', 'https://www.google.com/search?q=timer&rlz=1C1ONGR_enBD1046BD1046&oq=timer&gs_lcrp=EgZjaHJvbWUqBggAEEUYOzIGCAAQRRg7MgYIARBFGEAyBggCEEUYOzIGCAMQRRg9MgYIBBBFGDwyBggFEEUYPdIBCDI4OTVqMGo3qAIAsAIA&sourceid=chrome&ie=UTF-8', 'C'),
(43401, 'Sharmin Toa', 'CSE-121', 'ASN1', 'Try to submit your assignment on time, otherwise no overtime will be considered..', 'Assignemnt.pdf', 'https://drive.google.com/drive/u/0/my-drive', 'B'),
(43402, 'Sakia', 'CSE-115', 'ASN1', 'Please answer all the question', 'Assignemnt.pdf', 'https://drive.google.com/drive/u/0/my-drive', 'A'),
(43403, 'Sakia', 'CSE-115', 'ASN1', 'Please answer all the question', 'Assignemnt.pdf', 'https://drive.google.com/drive/u/0/my-drive', 'B');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course_code` varchar(255) DEFAULT NULL,
  `section` varchar(255) DEFAULT NULL,
  `teacher_name` varchar(255) DEFAULT NULL,
  `course_img` varchar(255) DEFAULT NULL,
  `course_outline_img` varchar(255) DEFAULT NULL,
  `course_objective` text DEFAULT NULL,
  `course_outcomes` text DEFAULT NULL,
  `whatsapp_link` varchar(255) DEFAULT NULL,
  `telegram_link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `welcome_note` text DEFAULT NULL,
  `accessed_time` varchar(255) DEFAULT NULL,
  `attendance_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_code`, `section`, `teacher_name`, `course_img`, `course_outline_img`, `course_objective`, `course_outcomes`, `whatsapp_link`, `telegram_link`, `created_at`, `welcome_note`, `accessed_time`, `attendance_link`) VALUES
(52, 'CSE-111', 'A', 'Sharmin Toa', 'Introduction-To-Computer-System.jpg', 'outline1.png', '1. Introduce the architecture of computer systems, including hardware and software interactions.\r\n2. Explore the basics of data representation, storage, and manipulation within computers.\r\n3. Familiarize students with operating system principles, including process management and memory management.\r\n4. Develop an understanding of the role and functionality of system software, including compilers and interpreters.\r\n5. Lay the groundwork for further study in specialized areas of computer science and information technology.                      ', '1. Understand Computer Architecture: Describe the basic architecture of a computer system, including the function of the CPU, memory hierarchy, input/output devices, and data paths.\r\n2. Comprehend System Operations: Explain how operating systems manage hardware and software resources, process scheduling, and memory.\r\n3. Data Representation and Manipulation: Understand how data is represented and manipulated within a computer system, including number systems, binary arithmetic, and logical operations.\r\n4. Software Interaction: Grasp the interaction between system software and hardware, including the role of compilers, interpreters, and application software.\r\n5. Problem-Solving Skills: Apply theoretical knowledge to solve practical problems related to computer systems and their components.                     ', 'www.telegram.com', 'https://web.whatsapp.com/', '2024-04-03 23:33:22', 'Welcome to CSE-111: Introduction to Computer Systems! This course marks the beginning of your fascinating journey into the world of computing. Here, we aim to provide you with a solid foundation in the principles and practices that underpin modern computer systems. Whether you\'re aiming to become a software developer, a systems analyst, or pursue any career in the IT sector, understanding computer systems is crucial. We look forward to exploring the intricacies of computing technology together, fostering a supportive and dynamic learning environment. Let\'s embark on this educational adventure with enthusiasm and an open mind to the endless possibilities that computing offers.', 'Saturday, 2024-05-04 11:28:45', ''),
(53, 'CSE-111', 'B', 'Sharmin Toa', 'Introduction-To-Computer-System.jpg', 'outline1.png', '1. Introduce the architecture of computer systems, including hardware and software interactions.\r\n2. Explore the basics of data representation, storage, and manipulation within computers.\r\n3. Familiarize students with operating system principles, including process management and memory management.\r\n4. Develop an understanding of the role and functionality of system software, including compilers and interpreters.\r\n5. Lay the groundwork for further study in specialized areas of computer science and information technology.                                                                                                                                     ', '1. Understand Computer Architecture: Describe the basic architecture of a computer system, including the function of the CPU, memory hierarchy, input/output devices, and data paths.\r\n2. Comprehend System Operations: Explain how operating systems manage hardware and software resources, process scheduling, and memory.\r\n3. Data Representation and Manipulation: Understand how data is represented and manipulated within a computer system, including number systems, binary arithmetic, and logical operations.\r\n4. Software Interaction: Grasp the interaction between system software and hardware, including the role of compilers, interpreters, and application software.\r\n5. Problem-Solving Skills: Apply theoretical knowledge to solve practical problems related to computer systems and their components.                                                                                                                                  ', 'www.telegram.com', 'www.whatsapp.com', '2024-04-04 10:48:33', 'Welcome to CSE-111: Introduction to Computer Systems! This course marks the beginning of your fascinating journey into the world of computing. Here, we aim to provide you with a solid foundation in the principles and practices that underpin modern computer systems. Whether you\'re aiming to become a software developer, a systems analyst, or pursue any career in the IT sector, understanding computer systems is crucial. We look forward to exploring the intricacies of computing technology together, fostering a supportive and dynamic learning environment. Let\'s embark on this educational adventure with enthusiasm and an open mind to the endless possibilities that computing offers.', 'Thursday, 2024-09-12 18:13:34', 'https://schoolattendancegujarat.in/'),
(55, 'CSE-111', 'C', 'Sharmin Toa', 'into_computer_system.jpg', 'outline1.png', '1. Introduce the architecture of computer systems, including hardware and software interactions.\r\n2. Explore the basics of data representation, storage, and manipulation within computers.\r\n3. Familiarize students with operating system principles, including process management and memory management.\r\n4. Develop an understanding of the role and functionality of system software, including compilers and interpreters.\r\n5. Lay the groundwork for further study in specialized areas of computer science and information technology.                                                     ', '1. Understand Computer Architecture: Describe the basic architecture of a computer system, including the function of the CPU, memory hierarchy, input/output devices, and data paths.\r\n2. Comprehend System Operations: Explain how operating systems manage hardware and software resources, process scheduling, and memory.\r\n3. Data Representation and Manipulation: Understand how data is represented and manipulated within a computer system, including number systems, binary arithmetic, and logical operations.\r\n4. Software Interaction: Grasp the interaction between system software and hardware, including the role of compilers, interpreters, and application software.\r\n5. Problem-Solving Skills: Apply theoretical knowledge to solve practical problems related to computer systems and their components.                                                 ', 'https://web.whatsapp.com/SharminToa', 'www.telegram.com/SharminToa', '2024-04-18 09:36:05', 'Welcome to CSE-111: Introduction to Computer Systems! This course marks the beginning of your fascinating journey into the world of computing. Here, we aim to provide you with a solid foundation in the principles and practices that underpin modern computer systems. Whether you\'re aiming to become a software developer, a systems analyst, or pursue any career in the IT sector, understanding computer systems is crucial. We look forward to exploring the intricacies of computing technology together, fostering a supportive and dynamic learning environment. Let\'s embark on this educational adventure with enthusiasm and an open mind to the endless possibilities that computing offers.', 'Saturday, 2024-05-04 11:28:08', NULL),
(56, 'CSE-121', 'B', 'Sharmin Toa', 'data structure.png', 'course_outline.png', 'To explore various data structures, including arrays, linked lists, trees, and graphs, and their implementations.\r\nTo learn common algorithms for searching, sorting, and traversing data structures.\r\nTo apply knowledge of data structures and algorithms to solve programming challenges and real-world problems.\r\nTo develop critical thinking and problem-solving skills through hands-on coding exercises and projects.', 'Identify and describe different types of data structures and their characteristics.\r\nImplement data structures such as arrays, linked lists, stacks, queues, trees, and graphs in various programming languages.\r\nApply common algorithms for searching, sorting, and traversing data structures effectively.\r\nAnalyze the time and space complexity of algorithms and make informed decisions on algorithm selection.', 'https://web.whatsapp.com/', 'www.telegram.com', '2024-04-18 10:16:18', 'Welcome to CSE-121: Introduction to Data Structure! This course marks the beginning of your fascinating journey into the world of computing. Here, we aim to provide you with a solid foundation in the principles and practices that underpin modern computer systems. Whether you\'re aiming to become a software developer, a systems analyst, or pursue any career in the IT sector, understanding computer systems is crucial. We look forward to exploring the intricacies of computing technology together, fostering a supportive and dynamic learning environment. Let\'s embark on this educational adventure with enthusiasm and an open mind to the endless possibilities that computing offers', 'Friday, 2024-08-30 06:15:01', NULL),
(57, 'CSE-112', 'B', 'Sanzida Islam', 'programming language.png', 'course_outline2.png', 'To familiarize students with the fundamental concepts and principles of programming languages.\r\nTo explore different programming paradigms, including procedural, functional, and object-oriented programming.\r\nTo provide hands-on experience with various programming languages and their syntax, semantics, and idioms.\r\nTo develop problem-solving skills through coding exercises, projects, and assignments.\r\nTo cultivate an understanding of software development best practices and coding standards.\r\nTo prepare students for careers in software engineering, web development, data science, and other related fields', 'Understand the fundamental concepts of programming languages, including variables, data types, and control structures.\r\nWrite clean, efficient, and maintainable code using different programming languages and programming paradigms.\r\nApply object-oriented programming principles to design and implement software solutions.\r\nSolve programming challenges and real-world problems using appropriate programming languages and techniques.\r\nCollaborate effectively with team members and contribute to software development projects.\r\nContinue learning and adapting to new programming languages and technologies throughout their careers.', 'https://web.whatsapp.com/', 'www.telegram.com', '2024-04-18 11:29:38', 'Welcome to the course \"Programming Language\"!\r\n\r\nIn this course, you\'ll dive into the fascinating world of programming languages, where you\'ll explore the syntax, semantics, and principles behind various programming paradigms. Whether you\'re a beginner or an experienced coder, this course will provide you with a comprehensive understanding of programming languages and their applications..', 'Thursday, 2024-04-18 13:56:50', NULL),
(58, 'CSE-112', 'A', 'Sanzida Islam', 'programming language.png', 'course_outline2.png', 'To familiarize students with the fundamental concepts and principles of programming languages.\r\nTo explore different programming paradigms, including procedural, functional, and object-oriented programming.\r\nTo provide hands-on experience with various programming languages and their syntax, semantics, and idioms.\r\nTo develop problem-solving skills through coding exercises, projects, and assignments.\r\nTo cultivate an understanding of software development best practices and coding standards.\r\nTo prepare students for careers in software engineering, web development, data science, and other related fields                     ', 'Understand the fundamental concepts of programming languages, including variables, data types, and control structures.\r\nWrite clean, efficient, and maintainable code using different programming languages and programming paradigms.\r\nApply object-oriented programming principles to design and implement software solutions.\r\nSolve programming challenges and real-world problems using appropriate programming languages and techniques.\r\nCollaborate effectively with team members and contribute to software development projects.\r\nContinue learning and adapting to new programming languages and technologies throughout their careers.             ', 'https://web.whatsapp.com/', 'www.telegram.com', '2024-04-18 11:39:34', 'Overview of programming languages\r\nHistory and evolution of programming languages\r\nTypes of programming languages (e.g., high-level, low-level, scripting)\r\nProgramming paradigms (e.g., procedural, functional, object-oriented)\r\nImportance and applications of programming languages in various fields', 'Thursday, 2024-04-18 13:43:51', NULL),
(59, 'CSE-123 ', 'A', 'Md Nahid Shams', 'Introduction to Electrical Engineering.jpg', 'course_outline3.png', 'Understand the basic concepts and principles of electrical engineering.\r\nDevelop problem-solving skills related to electrical circuits, systems, and devices.\r\nGain hands-on experience through practical exercises and laboratory sessions.\r\nExplore various applications of electrical engineering in real-world scenarios.\r\nPrepare for advanced studies or a career in electrical engineering or related fields.', 'Analyze and design simple electrical circuits using fundamental laws and techniques.\r\nApply mathematical tools and simulation software to model and solve electrical engineering problems.\r\nDemonstrate proficiency in using electrical measuring instruments and laboratory equipment.\r\nExplain the principles of electromagnetism and their applications in motors, generators, and transformers.\r\nEvaluate the performance of electrical systems and devices and propose appropriate improvements.', 'https://web.whatsapp.com/', 'www.telegram.com', '2024-04-18 13:44:21', 'Welcome to the exciting world of electrical engineering! In this course, you\'ll explore the fundamental principles and applications of electrical engineering, from basic circuit analysis to advanced topics in electronics and power systems. Whether you\'re a beginner or have some background in the field, this course will provide you with a solid foundation to understand and appreciate the marvels of electrical engineering. Get ready to embark on a journey of discovery and innovation!', 'Thursday, 2024-04-18 15:56:54', NULL),
(61, 'CSE-123', 'B', 'Md Nahid Shams', 'Introduction to Electrical Engineering.jpg', 'course_outline3.png', 'Understand the basic concepts and principles of electrical engineering.\r\nDevelop problem-solving skills related to electrical circuits, systems, and devices.\r\nGain hands-on experience through practical exercises and laboratory sessions.\r\nExplore various applications of electrical engineering in real-world scenarios.\r\nPrepare for advanced studies or a career in electrical engineering or related fields.', 'Analyze and design simple electrical circuits using fundamental laws and techniques.\r\nApply mathematical tools and simulation software to model and solve electrical engineering problems.\r\nDemonstrate proficiency in using electrical measuring instruments and laboratory equipment.\r\nExplain the principles of electromagnetism and their applications in motors, generators, and transformers.\r\nEvaluate the performance of electrical systems and devices and propose appropriate improvements.   ', 'https://web.whatsapp.com/', 'www.telegram.com', '2024-04-18 13:52:19', 'Welcome to the exciting world of electrical engineering! In this course, you\'ll explore the fundamental principles and applications of electrical engineering, from basic circuit analysis to advanced topics in electronics and power systems. Whether you\'re a beginner or have some background in the field, this course will provide you with a solid foundation to understand and appreciate the marvels of electrical engineering. Get ready to embark on a journey of discovery and innovation!', 'Thursday, 2024-04-18 15:56:58', NULL),
(62, 'CSE-115', 'B', 'Sakia', 'Discrete Mathematics.jpg', 'course_outcome.png', 'Develop a solid understanding of the fundamental concepts of differential calculus and analytical geometry.\r\nLearn techniques for solving problems involving limits, derivatives, and their applications in various fields.\r\nExplore the geometric properties of lines, circles, conics, and other curves in two and three dimensions.\r\nEnhance problem-solving abilities and critical thinking skills through rigorous mathematical exercises and applications.\r\nLay the groundwork for advanced studies in mathematics, engineering, physics, and other related disciplines.', 'Understand the concept of limits and their role in defining derivatives and integrals.\r\nCompute derivatives of algebraic, trigonometric, exponential, and logarithmic functions using differentiation rules.\r\nApply differential calculus techniques to solve problems in optimization, related rates, and curve sketching.\r\nAnalyze and interpret the geometric properties of lines, circles, parabolas, ellipses, and hyperbolas.\r\nVisualize and manipulate geometric objects in two and three dimensions using Cartesian coordinates and vectors.', 'https://web.whatsapp.com/', 'www.telegram.com', '2024-04-18 15:07:21', 'Welcome to the fascinating world of differential calculus and analytical geometry! In this course, you\'ll delve into the intricacies of calculus, exploring the concepts of limits, derivatives, and their applications. Additionally, you\'ll journey through the realm of analytical geometry, investigating the properties of lines, curves, and surfaces in two and three dimensions. Whether you\'re new to the subject or seeking to deepen your understanding, this course promises to be an enriching experience that will sharpen your analytical skills and expand your mathematical horizons.', 'Thursday, 2024-04-18 17:18:16', NULL),
(63, 'CSE-115', 'A', 'Sakia', 'Discrete Mathematics.jpg', 'course_outcome.png', 'Develop a solid understanding of the fundamental concepts of differential calculus and analytical geometry.\r\nLearn techniques for solving problems involving limits, derivatives, and their applications in various fields.\r\nExplore the geometric properties of lines, circles, conics, and other curves in two and three dimensions.\r\nEnhance problem-solving abilities and critical thinking skills through rigorous mathematical exercises and applications.\r\nLay the groundwork for advanced studies in mathematics, engineering, physics, and other related disciplines.  ', 'Understand the concept of limits and their role in defining derivatives and integrals.\r\nCompute derivatives of algebraic, trigonometric, exponential, and logarithmic functions using differentiation rules.\r\nApply differential calculus techniques to solve problems in optimization, related rates, and curve sketching.\r\nAnalyze and interpret the geometric properties of lines, circles, parabolas, ellipses, and hyperbolas.\r\nVisualize and manipulate geometric objects in two and three dimensions using Cartesian coordinates and vectors. ', 'https://web.whatsapp.com/', 'www.telegram.com', '2024-04-18 15:11:27', 'Welcome to the fascinating world of differential calculus and analytical geometry! In this course, you\'ll delve into the intricacies of calculus, exploring the concepts of limits, derivatives, and their applications. Additionally, you\'ll journey through the realm of analytical geometry, investigating the properties of lines, curves, and surfaces in two and three dimensions. Whether you\'re new to the subject or seeking to deepen your understanding, this course promises to be an enriching experience that will sharpen your analytical skills and expand your mathematical horizons.', 'Thursday, 2024-04-18 17:13:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `exam_question`
--

CREATE TABLE `exam_question` (
  `id` int(11) NOT NULL,
  `course_code` varchar(100) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `mid_question` varchar(255) DEFAULT NULL,
  `mid_pdf` varchar(255) DEFAULT NULL,
  `final_pdf` varchar(255) DEFAULT NULL,
  `final_question` varchar(255) DEFAULT NULL,
  `semester` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exam_question`
--

INSERT INTO `exam_question` (`id`, `course_code`, `department`, `mid_question`, `mid_pdf`, `final_pdf`, `final_question`, `semester`) VALUES
(7, 'CSE-111', 'CSE', 'Plz read the pdf . Exam time 10:00AM to 12:00PM', 'Final Exam.pdf', 'Final Exam.pdf', 'Plz read the final pdf . Exam time 10:00AM to 12:00PM', 'fall2024'),
(10, 'tafasd', 'afsd', 'sssssssss', 'Mid Exam.pdf', '', 'ssssssss', 'fsdafdfsd'),
(11, 'CSE-123', 'CSE', 'Answer all the question and read the question ', 'Mid Exam.pdf', NULL, '', 'fall-2024'),
(12, 'CSE-115', 'CSE', 'Answer all the question and read the question ', 'Mid Exam.pdf', NULL, '', 'fall-2024');

-- --------------------------------------------------------

--
-- Table structure for table `presentation`
--

CREATE TABLE `presentation` (
  `id` int(11) NOT NULL,
  `course_code` varchar(255) DEFAULT NULL,
  `section` varchar(255) DEFAULT NULL,
  `teacher_name` varchar(255) DEFAULT NULL,
  `presentation_instruction` text DEFAULT NULL,
  `presentation_submission_link` varchar(255) DEFAULT NULL,
  `current__time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `presentation`
--

INSERT INTO `presentation` (`id`, `course_code`, `section`, `teacher_name`, `presentation_instruction`, `presentation_submission_link`, `current__time`) VALUES
(2, 'CSE111', 'B', 'sayed', 'Prepare a presentation with the following details:\r\n\r\nCourse Code: [Your course code]\r\nSection: [Your section]\r\nTopic: Choose a relevant topic.\r\nDuration: Keep it within [specify minutes].\r\nPresentation Link: Share the link for the presentation.\r\nInstructions: Ensure clarity, use visuals, and engage the audience.\r\nQ&A: Be ready for questions at the end.', 'http://localhost/Online%20Course%20management%20of%20SBGPC/teacher/add_courses.php', '2024-01-09 04:02:12'),
(4, 'CSE-111', 'B', 'Sharmin Toa', 'The Presentation must not be more than 5 minutes....', 'https://www.youtube.com/watch?v=8w8zNITdX8E&list=PLNqhoGSt_Sa6A2p10cafetPbqK5OJAgIW&index=8&ab_channel=AlAbrorCom', '2024-04-15 15:03:43'),
(6, 'CSE-111', 'A', 'Sharmin Toa', 'Each group must have 5 members and the total presentation time must not be 15 minuites', 'https://github.com/', '2024-04-18 10:06:12'),
(7, 'CSE-111', 'C', 'Sharmin Toa', 'Submit your presentation in time. No extra time will be considered after your submission date', 'https://github.com/', '2024-04-18 10:07:34'),
(8, 'CSE-121', 'B', 'Sharmin Toa', 'Presentation must not be more than 10 minutes', 'https://drive.google.com/drive/u/0/my-drive', '2024-04-18 10:22:01'),
(9, 'CSE-115', 'B', 'Sakia', 'The presentation must not be more than 15 minutes.....', 'http://localhost/Online%20Course%20management%20of%20SBGPC/teacher/add_courses.php', '2024-04-18 15:25:22');

-- --------------------------------------------------------

--
-- Table structure for table `secrete_key`
--

CREATE TABLE `secrete_key` (
  `id` int(11) NOT NULL,
  `admin_key` varchar(255) DEFAULT NULL,
  `teacher_key` varchar(255) DEFAULT NULL,
  `student_key` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `secrete_key`
--

INSERT INTO `secrete_key` (`id`, `admin_key`, `teacher_key`, `student_key`) VALUES
(1, 'Admin123@###', '25*/@teacher!!!', 'student22@$$$');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `student_id` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact_num` varchar(15) DEFAULT NULL,
  `department` varchar(15) DEFAULT NULL,
  `section` varchar(15) DEFAULT NULL,
  `student_img` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `private_note` text DEFAULT NULL,
  `private_file` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `student_id`, `email`, `contact_num`, `department`, `section`, `student_img`, `password`, `private_note`, `private_file`) VALUES
(6, 't', '12365', 's@ss.gmaill.com', '21634', 'CSE', 'B', 'image-2024-02-08-16-10-36download.jpg', '$2y$10$d5xZ55JhsMbCmBw4OmJXGuJUQj7atPoaZOjuPr2QQbsTaEyXvB44y', NULL, NULL),
(7, 'tuaha', '192-15-13129', 'syeedmdtuaha@gmail.com', ' 01920905947', 'CSE', 'B', 'image-2024-02-10-07-31-21vehicle (1).png', '$2y$10$4JCvl2jmX3O/bBHF1Vf1yOzAKeXBLdph15OvyuNLyQufuDUcHcgEq', 'Aafdsafdsafsdfs', 'logo4.png'),
(9, 'Selina Akter Sakia', '2110029', 'selinaaktersakia@gmail.com', '+8801569362156', 'CSE', 'B', 'image-2024-04-18-15-35-34Selina Akter.jpg', '$2y$10$kB9hoQlcVHOrVPRGb./OmOHvd3ohylJyNvxndkKOIfYSHguFnC1fa', 'This is the private file where i can keep all of my private files', 'Assignemnt.pdf'),
(10, 'Rony', '192-15-13155', 'robotprojectbd@gmail.com', '+8801521569369', 'CSE', 'B', 'image-2024-05-04-11-24-44Screenshot 2024-03-03 235912.png', '$2y$10$b56ASKFcuezugHY2sUHuFOjQXeRJCy4tFBIxC0yQaoVLmG2.xQDYy', '', 'No files here..'),
(13, 'abc', '192-15-13130', 'abc@gmail.com', '+8801521569360', 'CSE', 'B', 'image-2024-08-30-06-08-41photo_2024-07-01_14-58-34.jpg', '$2y$10$E/dbpT3dU08DJDfdV.Abcu5ZR/6qy7BG.MMDRC4CeR.mNcv5qDCfm', '', 'No files here..');

-- --------------------------------------------------------

--
-- Table structure for table `student_course`
--

CREATE TABLE `student_course` (
  `id` int(11) NOT NULL,
  `student_name` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `student_id` varchar(255) DEFAULT NULL,
  `section` varchar(255) DEFAULT NULL,
  `accessed_time` varchar(255) NOT NULL DEFAULT current_timestamp(),
  `course_code` varchar(255) DEFAULT NULL,
  `course_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_course`
--

INSERT INTO `student_course` (`id`, `student_name`, `department`, `student_id`, `section`, `accessed_time`, `course_code`, `course_img`) VALUES
(84, 'tuaha', 'CSE', '192-15-13129', 'B', 'Saturday, 2024-06-01 12:34:18', 'CSE-111', 'Introduction-To-Computer-System.jpg'),
(85, 'tuaha', 'CSE', '192-15-13129', 'B', 'Saturday, 2024-05-04 11:20:33', 'CSE-112', 'programming language.png'),
(86, 'Selina Akter Sakia', 'CSE', '2110029', 'B', 'Thursday, 2024-04-18 15:36:07', 'CSE-111', 'Introduction-To-Computer-System.jpg'),
(87, 'Selina Akter Sakia', 'CSE', '2110029', 'B', 'Thursday, 2024-04-18 15:36:20', 'CSE-121', 'data structure.png'),
(88, 'Selina Akter Sakia', 'CSE', '2110029', 'B', 'Thursday, 2024-04-18 17:19:35', 'CSE-115', 'Discrete Mathematics.jpg'),
(92, 'abc', 'CSE', '192-15-13130', 'B', 'Friday, 2024-08-30 06:10:12', 'CSE-115', 'Discrete Mathematics.jpg'),
(93, 'abc', 'CSE', '192-15-13130', 'B', 'Friday, 2024-08-30 06:10:45', 'CSE-112', 'programming language.png');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `office_room` varchar(255) DEFAULT NULL,
  `contact_number` varchar(15) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `web_profile` varchar(255) DEFAULT NULL,
  `secret_key` varchar(50) DEFAULT NULL,
  `department` varchar(50) DEFAULT NULL,
  `teacher_img` varchar(255) DEFAULT NULL,
  `office_hour` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `private_note` text DEFAULT NULL,
  `private_file` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `name`, `office_room`, `contact_number`, `email`, `web_profile`, `secret_key`, `department`, `teacher_img`, `office_hour`, `password`, `private_note`, `private_file`) VALUES
(68, 'tuaha', '#111 (1st floor), Daffodil Tower-5, Daffodil International University, 102, Subhanbagh, Dhanmondi, Dhaka-1207', ' 01920905947', 'syeedmdtuaha@gmail.com', ' https://faculty.daffodilvarsity.edu.bd/profile/cse/afsara.html', '25*/@teacher!!!', 'EEE', 'background2.jpg', 'Sunday (14:00/16:00),Thursday (14:00/16:00) or by appointment', '$2y$10$I8ndfPOcPyEc.BvBL7O82.JLbxi2IN/txDypVsgHS6auRdHlvXSVO', NULL, NULL),
(71, 'Md Nahid Shams', '#111 (1st floor),SBPGC', '+8801521569369', 'NahidShams@gmail.com', 'https://bd.linkedin.com/in/md-nahid-shams-1a782240', '25*/@teacher!!!', 'CSE', 'Md Nahid Shams.jpg', 'Sunday (14:00/16:00),Thursday (14:00/16:00) or by appointment', '$2y$10$cveSCGg/sf8yJKZRduKk1une74MVD7RNHqk1POYPaDqSWn4UQu6Hm', NULL, NULL),
(72, 'Sharmin Toa', '#112 (1st floor),SBPGC', '+8801521569365', 'SharminToa@gmail.com', 'https://www.linkedin.com/in/sharmin-toa-3b5540168/?trk=public_profile_browsemap&originalSubdomain=bd', '25*/@teacher!!!', 'CSE', 'image-2024-03-30-20-31-22Sharmin Toa.jpg', 'Sunday (14:00/16:00),Thursday (14:00/16:00) or by appointment', '$2y$10$M8slrAQlpjapKjmFYq9qceNkoi8Fzr6xI1Jr6YPMD1X.k6IPevKLm', '55466666666', 'images.jpg'),
(73, 'Sanzida Islam', '#115(1st floor),SBPGC', '+8801521569370', 'SanzidaIslam@gmail.com', 'https://www.linkedin.com/in/sanzida-islam/?originalSubdomain=bd', '25*/@teacher!!!', 'EEE', 'image-2024-03-30-20-33-44Sanzida Islam.jpg', 'Sunday (14:00/16:00),Thursday (14:00/16:00) or by appointment', '$2y$10$LNxZSPTJxbyuBp.iMpbOKegmKHezIOGHbuqB142axTqGyvFj2/Vva', NULL, NULL),
(74, 'Shamima Nasrin', '#109 (1st floor),SBPGC', '+8801521569366', 'ShamimaNasrin@gmail.com', 'https://www.linkedin.com/in/shamima-nasrin-96879425/?originalSubdomain=bd', '25*/@teacher!!!', 'CSE', 'image-2024-03-30-20-35-46Shamima Nasrin.jpg', 'Sunday (14:00/16:00),Thursday (14:00/16:00) or by appointment', '$2y$10$jPLsq9JFyeDiMmE8DzgmBeKEl4ftPVWVl6zoaQ4UQts3hyB73G5/m', NULL, NULL),
(75, 'G Selim Ahmed', '#211 (2nd floor),SBPGC', '+8801521569356', 'SelimAhmed@gmail.com', 'https://www.linkedin.com/in/g-m-selim-ahmed-370522161/?originalSubdomain=bd', '25*/@teacher!!!', 'CSE', 'image-2024-03-30-20-37-47G Selim Ahmed.jpg', 'Sunday (14:00/16:00),Thursday (14:00/16:00) or by appointment', '$2y$10$g5kdNcdvmrR7qL8fhn3.H.O8WlG/moUe6dU.hAdX3/84CqSfiR2Y.', NULL, NULL),
(77, 'Sakia', '#111 (2st floor), Daffodil Tower-5, Daffodil International University, 102, Subhanbagh, Dhanmondi, Dhaka-1207', '+88015693624', 'sakia@gmail.com', ' https://faculty.daffodilvarsity.edu.bd/profile/cse/afsara.html', '25*/@teacher!!!', 'CSE', 'image-2024-04-18-17-02-08saki.jpg', 'Sunday (14:00/16:00),Thursday (14:00/16:00) or by appointment', '$2y$10$YxwFWkJjQwTWr51zYnYek.E8Bcqa1L/d5LH0nwNVsHE8tUvhiOcOi', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `name`, `description`) VALUES
(1, 'Item 1', 'Description for Item 1'),
(2, 'Item 2', 'Description for Item 2'),
(3, 'Item 3', 'Description for Item 3'),
(4, 'Syeed MD Tuaha', 'afasdfdsf'),
(5, 'Syeed MD Tuaha', 'afasdfdsf'),
(6, 'muntasir', '<h1>Pagla</h1>'),
(7, '<p style=\"color:red;\">Syeed MD Tuaha</p>', 'afddafsdfsd'),
(8, 'new', '<h1 style=\"color:green\"> I have some robots:</h1>\r\n1. Dog robot\r\n3. trash collector robot \r\n4. Drone');

-- --------------------------------------------------------

--
-- Table structure for table `weeklysection`
--

CREATE TABLE `weeklysection` (
  `id` int(11) NOT NULL,
  `course_code` varchar(255) DEFAULT NULL,
  `section` varchar(255) DEFAULT NULL,
  `teacher_name` varchar(255) DEFAULT NULL,
  `week_no` varchar(255) DEFAULT NULL,
  `topic_name` varchar(255) DEFAULT NULL,
  `topic_img` varchar(255) DEFAULT NULL,
  `topics_of_discussion` text DEFAULT NULL,
  `expected_outcome` text DEFAULT NULL,
  `class_recording` varchar(255) DEFAULT NULL,
  `lecture_slide` varchar(255) DEFAULT NULL,
  `lecture_video` varchar(255) DEFAULT NULL,
  `pdf` varchar(255) DEFAULT NULL,
  `question` text DEFAULT NULL,
  `question_pdf` varchar(255) DEFAULT NULL,
  `task_submission_link` text DEFAULT NULL,
  `current__time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `weeklysection`
--

INSERT INTO `weeklysection` (`id`, `course_code`, `section`, `teacher_name`, `week_no`, `topic_name`, `topic_img`, `topics_of_discussion`, `expected_outcome`, `class_recording`, `lecture_slide`, `lecture_video`, `pdf`, `question`, `question_pdf`, `task_submission_link`, `current__time`) VALUES
(31, 'CSE-111', 'B', 'Sharmin Toa', 'Week-01', 'Basics of Computer Systems', 'computer.jpg', 'Topics of Discussion:\r\n\r\n1. What is a Computer System? Understanding Hardware and Software.\r\n2. Key components of a computer: CPU, Memory, Storage, Input & Output Devices.\r\n3. Overview of Operating Systems.', 'Expected Learning Outcomes:\r\n\r\n# Identify the main components of a computer system.\r\n# Describe the function of each component within a computer.\r\n# Understand the role of operating systems in managing hardware and software resources.', 'https://www.google.com/drive/', 'Lecture Slide.pptx', 'https://www.youtube.com/watch?v=qfUZBKDh9BY&ab_channel=LearnComputerScience', 'Lesson of this topic.pdf', 'Q: What are the main differences between hardware and software?\r\nA: Hardware refers to the physical components of a computer, like the CPU and memory, while software is the collection of instructions that tells the hardware what to do.\r\nQ: Why is the operating system important?\r\nA: It manages the computer\'s memory, processes, software, and hardware. It also provides services for computer programs.', 'weekly question.pdf', 'https://drive.google.com/drive/u/0/my-drive', '2024-04-09 19:09:08'),
(35, 'CSE-111', 'B', 'Sharmin Toa', 'Week-02', 'Introduction to System Software', 'System_Software.png', 'Definition and types of system software.\r\nDeep dive into operating systems: Functions and examples.\r\nUtility software: What is it and how is it used?', 'Explain what system software is and its importance to the functioning of computers.\r\nDifferentiate between various types of system software, especially operating systems and utilities.\r\nRecognize examples of system software and their applications.', 'https://www.youtube.com/results?search_query=Introduction+to+computer+system', 'Lecture Slide.pptx', 'https://drive.google.com/drive/folders/1QlAzlmZKE62zOoFCzLKLNHqFAXCQTx-N?usp=sharing', 'Lesson of this topic.pdf', 'Q: Can a computer run without an operating system?\r\nA: No, the operating system is essential as it provides the necessary framework for application software to operate.\r\nQ: What are utility programs and give an example?\r\nA: Utilities are software programs that perform specific tasks, usually related to managing system resources. Examples include antivirus software and disk defragmenters.', 'weekly question.pdf', 'https://drive.google.com/drive/u/0/my-drive', '2024-04-18 09:14:45'),
(36, 'CSE-111', 'B', 'Sharmin Toa', 'Week-03', 'Data Management and Storage', 'Data Management and Storage.jpg', 'Understanding Data Storage: Primary vs Secondary Storage.\r\nIntroduction to File Systems and their role in data management.\r\nData Security: Basic principles and practices.', 'Distinguish between different types of data storage devices.\r\nUnderstand how file systems organize, store, and retrieve data.\r\nComprehend basic data security measures to protect data integrity and privacy.', 'https://www.youtube.com/watch?v=e_cY2Kv9h4U&t=1s', 'Lecture Slide.pptx', 'https://drive.google.com/drive/folders/1QlAzlmZKE62zOoFCzLKLNHqFAXCQTx-N?usp=sharing', 'Lesson of this topic.pdf', 'Q: What is the difference between RAM and a hard disk?\r\nA: RAM is volatile memory used for temporary data storage while the system is running, whereas a hard disk is a non-volatile storage device used for long-term data storage.\r\nQ: How do file systems affect system performance?\r\nA: File systems manage how data is stored and retrieved. Efficient file systems can speed up these processes and improve overall system performance.', '', 'https://drive.google.com/drive/u/0/my-drive', '2024-04-18 09:19:27'),
(37, 'CSE-111', 'A', 'Sharmin Toa', 'Week-01', 'Basics of Computer Systems', 'computer.jpg', 'What is a Computer System? Understanding Hardware and Software.\r\nKey components of a computer: CPU, Memory, Storage, Input & Output Devices.\r\nOverview of Operating Systems.', 'Identify the main components of a computer system.\r\nDescribe the function of each component within a computer.\r\nUnderstand the role of operating systems in managing hardware and software resources.', 'https://www.youtube.com/watch?v=e_cY2Kv9h4U&t=1s', 'Lecture Slide.pptx', 'https://drive.google.com/drive/folders/1QlAzlmZKE62zOoFCzLKLNHqFAXCQTx-N?usp=sharing', 'Lesson of this topic.pdf', 'Q: What are the main differences between hardware and software?\r\nA: Hardware refers to the physical components of a computer, like the CPU and memory, while software is the collection of instructions that tells the hardware what to do.\r\nQ: Why is the operating system important?\r\nA: It manages the computer\'s memory, processes, software, and hardware. It also provides services for computer programs.', 'Lesson of this topic.pdf', 'https://drive.google.com/drive/u/0/my-drive', '2024-04-18 09:30:24'),
(38, NULL, NULL, NULL, 'Week-01', 'Basics of Computer Systems', 'computer.jpg', '1. What is a Computer System? Understanding Hardware and Software.\r\n2. Key components of a computer: CPU, Memory, Storage, Input & Output Devices.\r\n3. Overview of Operating Systems.', '# Identify the main components of a computer system.\r\n# Describe the function of each component within a computer.\r\n# Understand the role of operating systems in managing hardware and software resources.', 'https://www.youtube.com/watch?v=e_cY2Kv9h4U&t=1s', 'Lecture Slide.pptx', 'https://drive.google.com/drive/folders/1QlAzlmZKE62zOoFCzLKLNHqFAXCQTx-N?usp=sharing', 'Lesson of this topic.pdf', 'Q: What are the main differences between hardware and software?\r\nA: Hardware refers to the physical components of a computer, like the CPU and memory, while software is the collection of instructions that tells the hardware what to do.\r\nQ: Why is the operating system important?\r\nA: It manages the computer\'s memory, processes, software, and hardware. It also provides services for computer programs.', '', 'https://drive.google.com/drive/u/0/my-drive', '2024-04-18 09:38:16'),
(39, 'CSE-111', 'C', 'Sharmin Toa', 'Week-01', 'Basics of Computer Systems', 'into_computer_system.jpg', '1. What is a Computer System? Understanding Hardware and Software.\r\n2. Key components of a computer: CPU, Memory, Storage, Input & Output Devices.\r\n3. Overview of Operating Systems.', '# Identify the main components of a computer system.\r\n# Describe the function of each component within a computer.\r\n# Understand the role of operating systems in managing hardware and software resources.', 'https://www.youtube.com/watch?v=e_cY2Kv9h4U&t=1s', 'Lecture Slide.pptx', 'https://drive.google.com/drive/folders/1QlAzlmZKE62zOoFCzLKLNHqFAXCQTx-N?usp=sharing', 'Lesson of this topic.pdf', 'Q: What are the main differences between hardware and software?\r\nA: Hardware refers to the physical components of a computer, like the CPU and memory, while software is the collection of instructions that tells the hardware what to do.\r\nQ: Why is the operating system important?\r\nA: It manages the computer\'s memory, processes, software, and hardware. It also provides services for computer programs.', 'weekly question.pdf', 'https://drive.google.com/drive/u/0/my-drive', '2024-04-18 09:52:59'),
(40, 'CSE-121', 'B', 'Sharmin Toa', 'Week-01', 'Fundamentals of Data Structures', 'Fundamentals of Data Structures.jpg', 'Topics of Discussion:\r\nIntroduction to Data Structures: Definition and Importance.\r\nCommon Data Structures: Arrays, Linked Lists, Stacks, Queues.\r\nOperations and Applications of Data Structures.', 'Understand the concept and significance of data structures in computer science.\r\nIdentify and describe various fundamental data structures and their characteristics.\r\nExplore real-world applications of data structures in programming and problem-solving.', 'https://www.youtube.com/watch?v=e_cY2Kv9h4U&t=1s', 'Lecture Slide.pptx', 'https://drive.google.com/drive/folders/1QlAzlmZKE62zOoFCzLKLNHqFAXCQTx-N?usp=sharing', 'Assignemnt.pdf', 'Q: Why are data structures essential in programming?\r\nA: Data structures provide efficient ways to store, retrieve, and manipulate data, enabling programmers to optimize algorithms and improve performance.\r\nQ: What are the key differences between arrays and linked lists?\r\nA: Arrays store elements in contiguous memory locations, allowing direct access based on index, while linked lists use nodes with pointers to connect elements, offering flexibility in size and insertion/deletion operations.', 'Lesson of this topic.pdf', 'https://drive.google.com/drive/u/0/my-drive', '2024-04-18 10:19:43'),
(41, 'CSE-112', 'B', 'Sanzida Islam', 'Week-01', 'Introduction to Programming Languages', 'programming language.png', 'Overview of programming languages\r\nHistory and evolution of programming languages\r\nTypes of programming languages (e.g., high-level, low-level, scripting)\r\nProgramming paradigms (e.g., procedural, functional, object-oriented)\r\nImportance and applications of programming languages in various fields', 'Overview of programming languages\r\nHistory and evolution of programming languages\r\nTypes of programming languages (e.g., high-level, low-level, scripting)\r\nProgramming paradigms (e.g., procedural, functional, object-oriented)\r\nImportance and applications of programming languages in various fields', 'https://drive.google.com/drive/u/0/my-drive', 'Lecture Slide.pptx', 'https://drive.google.com/drive/u/0/my-drive', 'Assignemnt.pdf', 'What are the key differences between high-level and low-level programming languages?\r\nHow has the evolution of programming languages impacted software development practices?\r\nCan you provide examples of programming languages that represent different paradigms?', 'Lesson of this topic.pdf', 'https://drive.google.com/drive/u/0/my-drive', '2024-04-18 11:36:40'),
(42, 'CSE-112', 'A', 'Sanzida Islam', 'Week-01', 'Introduction to Programming Languages', 'programming language.png', 'Overview of programming languages\r\nHistory and evolution of programming languages\r\nTypes of programming languages (e.g., high-level, low-level, scripting)\r\nProgramming paradigms (e.g., procedural, functional, object-oriented)\r\nImportance and applications of programming languages in various fields', 'Overview of programming languages\r\nHistory and evolution of programming languages\r\nTypes of programming languages (e.g., high-level, low-level, scripting)\r\nProgramming paradigms (e.g., procedural, functional, object-oriented)\r\nImportance and applications of programming languages in various fields', 'https://drive.google.com/drive/u/0/my-drive', 'Lecture Slide.pptx', 'https://drive.google.com/drive/u/0/my-drive', 'Assignemnt.pdf', 'What are the key differences between high-level and low-level programming languages?\r\nHow has the evolution of programming languages impacted software development practices?\r\nCan you provide examples of programming languages that represent different paradigms?', '', 'https://drive.google.com/drive/u/0/my-drive', '2024-04-18 11:43:44'),
(43, 'CSE-123 ', 'A', 'Md Nahid Shams', 'Week-01', 'Introduction to Electric Circuits', 'Introduction to Electric Circuits.jpg', 'Basics of electric circuits\r\nCircuit elements: resistors, capacitors, inductors\r\nKirchhoff\'s laws and circuit analysis techniques\r\nSeries and parallel circuits\r\nVoltage and current sources', 'Understand the fundamental concepts of electric circuits and their components.\r\nApply Kirchhoff\'s laws to analyze simple circuits and calculate voltage and current values.\r\nDifferentiate between series and parallel circuits and solve problems involving their analysis.\r\nIdentify different types of voltage and current sources and their characteristics.', 'https://www.youtube.com/watch?v=e_cY2Kv9h4U&t=1s', 'Lecture Slide.pptx', 'https://drive.google.com/drive/folders/1QlAzlmZKE62zOoFCzLKLNHqFAXCQTx-N?usp=sharing', 'Mid Exam.pdf', 'What are the basic components of an electric circuit, and how do they interact with each other?\r\nHow do Kirchhoff\'s laws help in analyzing complex electrical circuits?\r\nCan you explain the differences between series and parallel circuits, and provide examples of each?', 'Lesson of this topic.pdf', 'https://drive.google.com/drive/u/0/my-drive', '2024-04-18 13:46:15'),
(44, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', '2024-04-18 13:48:14'),
(45, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', '2024-04-18 13:52:23'),
(46, 'CSE-123', 'B', 'Md Nahid Shams', 'Week-01', 'Introduction to Electric Circuits', 'Introduction to Electric Circuits.jpg', 'Basics of electric circuits\r\nCircuit elements: resistors, capacitors, inductors\r\nKirchhoff\'s laws and circuit analysis techniques\r\nSeries and parallel circuits\r\nVoltage and current sources', 'Understand the fundamental concepts of electric circuits and their components.\r\nApply Kirchhoff\'s laws to analyze simple circuits and calculate voltage and current values.\r\nDifferentiate between series and parallel circuits and solve problems involving their analysis.\r\nIdentify different types of voltage and current sources and their characteristics.', 'https://www.youtube.com/watch?v=e_cY2Kv9h4U&t=1s', 'Lecture Slide.pptx', 'https://drive.google.com/drive/folders/1QlAzlmZKE62zOoFCzLKLNHqFAXCQTx-N?usp=sharing', 'Lesson of this topic.pdf', 'What are the basic components of an electric circuit, and how do they interact with each other?\r\nHow do Kirchhoff\'s laws help in analyzing complex electrical circuits?\r\nCan you explain the differences between series and parallel circuits, and provide examples of each?\r\n', '', 'https://drive.google.com/drive/u/0/my-drive', '2024-04-18 13:56:19'),
(47, 'CSE-115', 'A', 'Sakia', 'Week-01', 'Limits and Derivatives', 'limits-properties.png', 'Definition and properties of limits\r\nTechniques for computing limits\r\nIntroduction to derivatives and their interpretation\r\nDerivative rules and their applications\r\nDerivatives of trigonometric, exponential, and logarithmic functions', 'Understand the concept of a limit and its significance in calculus.\r\nApply various methods, such as direct substitution, factoring, and L\'Hôpital\'s rule, to evaluate limits.\r\nDefine the derivative of a function and interpret it geometrically and analytically.\r\nCompute derivatives using differentiation rules and apply them to solve problems in rates of change and optimization.', 'https://drive.google.com/drive/u/0/my-drive', 'Lecture Slide.pptx', 'https://drive.google.com/drive/folders/1QlAzlmZKE62zOoFCzLKLNHqFAXCQTx-N?usp=sharing', 'Lesson of this topic.pdf', '1. What is the definition of a limit, and how does it relate to the concept of continuity?\r\n2. Discuss the different techniques for evaluating limits, including substitution, factoring, and the use of L\'Hôpital\'s rule.\r\n3. Explain the geometric interpretation of the derivative and its connection to the slope of a curve.', 'Lesson of this topic.pdf', 'https://drive.google.com/drive/u/0/my-drive', '2024-04-18 15:13:20'),
(48, 'CSE-115', 'B', 'Sakia', 'Week-01', 'Limits and Derivatives', 'limits-properties.png', 'Definition and properties of limits\r\nTechniques for computing limits\r\nIntroduction to derivatives and their interpretation\r\nDerivative rules and their applications\r\nDerivatives of trigonometric, exponential, and logarithmic functions', 'Understand the concept of a limit and its significance in calculus.\r\nApply various methods, such as direct substitution, factoring, and L\'Hôpital\'s rule, to evaluate limits.\r\nDefine the derivative of a function and interpret it geometrically and analytically.\r\nCompute derivatives using differentiation rules and apply them to solve problems in rates of change and optimization.', 'https://www.youtube.com/watch?v=e_cY2Kv9h4U&t=1s', 'Lecture Slide.pptx', 'https://drive.google.com/drive/folders/1QlAzlmZKE62zOoFCzLKLNHqFAXCQTx-N?usp=sharing', 'Lesson of this topic.pdf', 'What is the definition of a limit, and how does it relate to the concept of continuity?\r\nDiscuss the different techniques for evaluating limits, including substitution, factoring, and the use of L\'Hôpital\'s rule.\r\nExplain the geometric interpretation of the derivative and its connection to the slope of a curve.', 'Lesson of this topic.pdf', 'https://drive.google.com/drive/u/0/my-drive', '2024-04-18 15:15:10'),
(49, 'CSE-115', 'B', 'Sakia', 'Week-02', 'Analytical Geometry of Two and Three Dimensions', 'Analytical Geometry of Two and Three Dimensions.jpg', 'Cartesian coordinates in two and three dimensions\r\nEquations of lines and planes\r\nProperties of conic sections: circles, parabolas, ellipses, and hyperbolas\r\nParametric equations and polar coordinates\r\nVectors and vector operations in two and three dimensions', 'Understand the principles of Cartesian coordinates and their applications in geometry.\r\nDerive equations of lines and planes and analyze their geometric properties.\r\nExplore the characteristics of conic sections and their representations in two and three dimensions.\r\nUtilize parametric equations and polar coordinates to describe curves and regions in the plane.\r\nLearn the fundamentals of vectors and perform vector operations in two and three dimensions.', 'https://www.youtube.com/watch?v=e_cY2Kv9h4U&t=1s', 'Lecture Slide.pptx', 'https://drive.google.com/drive/folders/1QlAzlmZKE62zOoFCzLKLNHqFAXCQTx-N?usp=sharing', 'Lesson of this topic.pdf', 'How do Cartesian coordinates facilitate the representation and analysis of geometric objects in two and three dimensions?\r\nDiscuss the general forms of equations for lines and planes and provide examples of their applications in geometry and physics.\r\nDescribe the geometric properties of conic sections and illustrate how they can be classified based on their eccentricity and orientation.', 'Lesson of this topic.pdf', 'https://drive.google.com/drive/u/0/my-drive', '2024-04-18 15:17:53'),
(50, 'CSE-121', 'B', 'Sharmin Toa', 'Week-03', 'afdsfsdf', 'photo_2024-07-01_14-58-34.jpg', 'afsdfsa', 'ffsdfsda', 'ddddddddddddddddddddddddddddddddddddddddd', 'photo_2024-07-01_14-58-34.jpg', '', 'photo_2024-07-01_14-58-34.jpg', 'afsdfds', '', '', '2024-08-30 04:14:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `admin_course`
--
ALTER TABLE `admin_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_question`
--
ALTER TABLE `exam_question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `presentation`
--
ALTER TABLE `presentation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `secrete_key`
--
ALTER TABLE `secrete_key`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_course`
--
ALTER TABLE `student_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `weeklysection`
--
ALTER TABLE `weeklysection`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admin_course`
--
ALTER TABLE `admin_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43404;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `exam_question`
--
ALTER TABLE `exam_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `presentation`
--
ALTER TABLE `presentation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `secrete_key`
--
ALTER TABLE `secrete_key`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `student_course`
--
ALTER TABLE `student_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `weeklysection`
--
ALTER TABLE `weeklysection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
