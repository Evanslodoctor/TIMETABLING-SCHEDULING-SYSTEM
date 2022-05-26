# TIMETABLING-SCHEDULING-SYSTEM
The timetable of an institution is one of its most essential features. That is why all institutions, large and small, adhere to a schedule. It is a schedule that divides the school day into different times and assigns different subjects to each session. A time chart lists the activities that must be completed in a school on a specific day. As a result, it is critical in institutions.  Many industries require scheduling in order to run efficiently and effectively. It can be found in public transportation, hospitals, and educational institutions, among other places. There are many factors to consider in educational settings, particularly at higher education institutions, which makes scheduling a difficult task[1]. Some of the frequent considerations in the case of educa-tional institutions are the availability of lecturers, the number of classes and courses, and budget-ing. Planning a schedule manually is effort and time-consuming compared to automated scheduling. Several requirements must be met during scheduling. The following are some common limits to consider: only one instructor can teach one class at a time, a room can only hold one class at a time, and students should not have more than one class every session. Hard and soft constraints are frequently used to categorize these limitations
CHAPTER FIVE
SYSTEM DESIGN
5.0 Overview
This chapter will provide a general understanding of the system design of a computer laboratory scheduling system. The chapter expounds on the logical design, physical design and database de-sign for the computer laboratory scheduling system. On the physical design for computer labora-tory scheduling system outlines how the system looks like by presenting the interfaces available in the system. In the long run, this chapter will conclude by summarizing whatever have been discussed in the whole chapter.
5.1 Logical design for computer laboratory scheduling system.
Entity Relationship Diagram shows that the real world consists of a collection of entities, the re-lationships between them and the attributes that describe them[33]. Its importance is that pro-vides mechanism for quickly and easily modelling data structures required by a software system.
 
FIGURE 6 ENTITY RELATIONSHIP DIAGRAM
5.2 Physical design for computer laboratory scheduling system.
5.2.1 Home page
This is the Main Page of the project ‘computer laboratory scheduling system’. On this page user will be able to register, contact and login once the user gets registered. Homepage interface is il-lustrated in the figure 7 below.
 
FIGURE 7 HOME PAGE INTERFACE
5.2.2 Registration form
On this registration form a user is required to fill in various fields in the form which gets stored into the database. This is illustrated in the figure 8 below.
 
FIGURE 8 REGISTRATION FORM INTERFACE
5.2.3 Login form
Once registered, a user only needs to login in every time they want to access the system. Login form is illustrated in the figure below.
 
FIGURE 9 LOGIN FORM INTERFACE
5.2.4 Admin panel
On this interface, once admin login is able to carry out all task required like adding or deleting programs, departments among others. Admin panel is illustrated in the figure below.
 
FIGURE 10 ADMIN PAGE INTERFACE
5.2.5 Student panel
On this interface, student login first thereafter is taken to this interface where students view the timetable, profile among others. The figure below gives student interface.
 
FIGURE 11 STUDENT DASHBOARD INTERFACE
5.3 Database design for computer laboratory scheduling system.
5.3.1 Students table
Students table include email, registration number, first name, last name, program, department and other attributes as shown in Table below. studentID is set as the primary key for the students ta-ble to identify the constraints. Table 2 below shows the student table
TABLE 2 STUDENT TABLE
 
5.3.2 Lecturer table
Lecturer table has the following attributes; first name, gender, last name, username, password, lectureID among others. LecturerID is the only primary key which is used to identify constraints and ensure that each data content is not exactly the same with another data content. Table below is the lecturer table. Table 3 below is a Lecturer table
TABLE 3 LECTURER TABLE
 
 
5.3.3 Faculty table
Attributes for faculty table are facultyID and faculty Name. Primary key on faculty table facul-tyID which is used to identify the constraints and ensure data contents are not exactly the same. Figure 14 below illustrates faculty table.
TABLE 4 FACULTY TABLE
 
5.3.4 Department table
Attributes for department table are departmentID and department Name. Primary key on faculty table departmentID which is used to identify the constraints and ensure data contents are not exactly the same. Figure 15 below illustrates department table.
TABLE 5 DEPARTMENT TABLE
 

5.3.5 Program table
Attributes for faculty table are prog_id, capacity, department, prog_name, semester and year. Primary key on faculty table prog_id which is used to identify the constraints and ensure data contents are not exactly the same. Figure 16 below illustrates program table.
TABLE 6 PROGRAM TABLE
 
5.4 Summary
The chapter covered logical design where entity-relationship diagram for computer laboratory scheduling system is given showing entities, relationship between them and the attributes for each entity. Physical design gives interfaces within computer laboratory scheduling system. Last-ly, database design also has tables that have been discussed like student table, lecturer table among other tables in the system. 

