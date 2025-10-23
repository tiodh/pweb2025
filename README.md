# Web Programming Assignment 2025

## Initial Setup
1. git clone https://github.com/tiodh/pweb2025.git  
2. composer install  
3. php artisan migrate  
4. php artisan db:seed
5. npm run build

## Task Distribution
| No | Table Name                         | Assigned To                               |
| -- | ---------------------------------- | ----------------------------------------- |
| 1  | users                              | — (Laravel default)                       |
| 2  | universities                       | **Tio Dharmawan**                         |
| 3  | faculties                          | **MICHAEL MUHAMMAD YUDANANTA**            |
| 4  | departments                        | **HASY ARVIN AHMAD**                      |
| 5  | study_programs                     | **MOCHAMMAD RYAN ALVIANSYAH**             |
| 6  | lecturers                          | **REGINA DIVA OLINDIA PUTRI**             |
| 7  | students                           | **DAFFA GASTIA PRABASWARA**               |
| 8  | courses                            | **ADAM RIZQI FIRDAUSI**                   |
| 9  | classes                            | **ACHMAD NUHAN T**                        |
| 10 | teaching_lecturers                 | **MUHAMAD ROHMAD HIDAYAT**                |
| 11 | buildings                          | **ADIRA FATIH ROMADHAN**                  |
| 12 | rooms                              | **PRADITYA SAVILLA YOVIEANDRA**           |
| 13 | schedules                          | **KAYSA RAFA ADITYA PUTRA NEGARA**        |
| 14 | registrations                      | **MUHAMMAD SALMAN GHIFFARY HIDAYATULLAH** |
| 15 | course_registrations (KRS)         | **AHMAD ADAM SAIFUL MILA**                |
| 16 | grades                             | **GUNAWAN WICAKSONO**                     |
| 17 | academic_years                     | **YURI WICAKSONO**                        |
| 18 | semesters                          | **ARUL PRAMANA BAHARI**                   |
| 19 | scholarships                       | **ACHMAD FAIEZ JATMIKO**                  |
| 20 | scholarship_recipients             | **MOHAMMAD ALFIN KAMAL SAPUTRA**          |
| 21 | tuition_fees                       | **AHMAD ZAFARELL ZOUVAN DHANI**           |
| 22 | payments                           | **RADITYA FAHRIZAL DIANDRA**              |
| 23 | announcements                      | **ADITIYA RIFKY ARYA PUTRA**              |
| 24 | lecturer_accounts                  | **ATHA RIFYAN ADYFY**                     |
| 25 | student_accounts                   | **MUHAMMAD FAJRUL FALAH**                 |
| 26 | academic_guidance                  | **NASRULLOH TRI RAMADHANI**               |
| 27 | theses                             | **MOHAMAD ARYA FAHREZA HIDAYAD**          |
| 28 | thesis_supervisors                 | **MUHAMAD RIZQI RAMADHANI**               |
| 29 | thesis_defenses                    | **MUHAMMAD RAIHAN RAMDHANI**              |
| 30 | thesis_examiners                   | **SYADID CHOIRI**                         |
| 31 | alumni                             | **MUHAMMAD NIZAR WICAKSONO**              |
| 32 | companies                          | **AGUNG KURNIAWAN**                       |
| 33 | job_vacancies                      | **MOCHAMMAD REIKHAN ZAKY**                |
| 34 | job_applications                   | **CHRISTIAN EVAN RAHARJO**                |
| 35 | student_organizations              | **DARREL FAWWAZ AGATHON**                 |
| 36 | organization_members               | **AIRELL FITRAHAVILA**                    |
| 37 | achievements                       | **ERGA PRATAMA**                          |
| 38 | trainings                          | **KHOSYATULLAH AHMAD**                    |
| 39 | training_participants              | **YURISSANDY AL AHAM PRATAMA**            |
| 40 | activity_logs                      | **ADJASTYA BUDI ADJIE SYAHPUTRA**         |
| 41 | data_change_history                | **M. AGIL ASSHOFI**                       |

# SIMPT ERD

## 1. users
- id (PK)
- name  
- email  
- password  
- role (admin/lecturer/student)  
- created_at  
- updated_at  

## 2. universities
- id (PK)
- name  
- address  
- phone  
- email  
- created_at  
- updated_at  

## 3. faculties
- id (PK)
- university_id (FK → universities.id)
- name  
- dean  
- faculty_code  
- created_at  
- updated_at  

## 4. departments
- id (PK)
- faculty_id (FK → faculties.id)
- name  
- department_code  
- head_of_department  
- created_at  
- updated_at  

## 5. study_programs
- id (PK)
- department_id (FK → departments.id)
- name  
- degree_level  
- accreditation  
- created_at  
- updated_at  

## 6. lecturers
- id (PK)
- nip  
- name  
- email  
- study_program_id (FK → study_programs.id)
- created_at  
- updated_at  

## 7. students
- id (PK)
- nim  
- name  
- cohort_year  
- study_program_id (FK → study_programs.id)
- created_at  
- updated_at  

## 8. courses
- id (PK)
- course_code  
- name  
- credits  
- study_program_id (FK → study_programs.id)
- created_at  
- updated_at  

## 9. classes
- id (PK)
- course_id (FK → courses.id)
- class_name  
- semester  
- academic_year  
- created_at  
- updated_at  

## 10. teaching_lecturers
- id (PK)
- lecturer_id (FK → lecturers.id)
- class_id (FK → classes.id)
- teaching_status  
- remarks  
- created_at  
- updated_at  

## 11. buildings
- id (PK)
- name  
- location  
- floors  
- building_code  
- created_at  
- updated_at  

## 12. rooms
- id (PK)
- building_id (FK → buildings.id)
- room_code  
- capacity  
- room_type  
- created_at  
- updated_at  

## 13. schedules
- id (PK)
- class_id (FK → classes.id)
- room_id (FK → rooms.id)
- day  
- start_time  
- end_time  
- created_at  
- updated_at  

## 14. registrations
- id (PK)
- student_id (FK → students.id)
- semester  
- academic_year  
- status  
- created_at  
- updated_at  

## 15. course_registrations (KRS)
- id (PK)
- registration_id (FK → registrations.id)
- class_id (FK → classes.id)
- registration_date  
- validation_status  
- created_at  
- updated_at  

## 16. grades
- id (PK)
- course_registration_id (FK → course_registrations.id)
- numeric_grade  
- letter_grade  
- input_date  
- created_at  
- updated_at  

## 17. academic_years
- id (PK)
- start_year  
- end_year  
- active_status  
- notes  
- created_at  
- updated_at  

## 18. semesters
- id (PK)
- name  
- academic_year_id (FK → academic_years.id)
- status  
- order  
- created_at  
- updated_at  

## 19. scholarships
- id (PK)
- name  
- provider  
- type  
- period  
- created_at  
- updated_at  

## 20. scholarship_recipients
- id (PK)
- student_id (FK → students.id)
- scholarship_id (FK → scholarships.id)
- year  
- status  
- created_at  
- updated_at  

## 21. tuition_fees
- id (PK)
- study_program_id (FK → study_programs.id)
- semester  
- amount  
- payment_type  
- created_at  
- updated_at  

## 22. payments
- id (PK)
- student_id (FK → students.id)
- tuition_fee_id (FK → tuition_fees.id)
- payment_date  
- amount  
- created_at  
- updated_at  

## 23. announcements
- id (PK)
- title  
- content  
- date  
- user_id (FK → users.id)
- created_at  
- updated_at  

## 24. lecturer_accounts
- id (PK)
- user_id (FK → users.id)
- lecturer_id (FK → lecturers.id)
- status  
- last_login  
- created_at  
- updated_at  

## 25. student_accounts
- id (PK)
- user_id (FK → users.id)
- student_id (FK → students.id)
- status  
- last_login  
- created_at  
- updated_at  

## 26. academic_guidance
- id (PK)
- student_id (FK → students.id)
- lecturer_id (FK → lecturers.id)
- date  
- notes  
- created_at  
- updated_at  

## 27. theses
- id (PK)
- student_id (FK → students.id)
- title  
- status  
- submission_date  
- created_at  
- updated_at  

## 28. thesis_supervisors
- id (PK)
- thesis_id (FK → theses.id)
- lecturer_id (FK → lecturers.id)
- role  
- approval_status  
- created_at  
- updated_at  

## 29. thesis_defenses
- id (PK)
- thesis_id (FK → theses.id)
- defense_date  
- room_id (FK → rooms.id)
- defense_status  
- created_at  
- updated_at  

## 30. thesis_examiners
- id (PK)
- thesis_defense_id (FK → thesis_defenses.id)
- lecturer_id (FK → lecturers.id)
- grade  
- remarks  
- created_at  
- updated_at  

## 31. alumni
- id (PK)
- student_id (FK → students.id)
- graduation_year  
- occupation  
- company  
- created_at  
- updated_at  

## 32. companies
- id (PK)
- name  
- address  
- contact  
- email  
- created_at  
- updated_at  

## 33. job_vacancies
- id (PK)
- company_id (FK → companies.id)
- title  
- description  
- closing_date  
- created_at  
- updated_at  

## 34. job_applications
- id (PK)
- alumni_id (FK → alumni.id)
- job_vacancy_id (FK → job_vacancies.id)
- application_date  
- status  
- created_at  
- updated_at  

## 35. student_organizations
- id (PK)
- name  
- type  
- established_year  
- advisor_id (FK → lecturers.id)
- created_at  
- updated_at  

## 36. organization_members
- id (PK)
- organization_id (FK → student_organizations.id)
- student_id (FK → students.id)
- position  
- period  
- created_at  
- updated_at  

## 37. achievements
- id (PK)
- student_id (FK → students.id)
- achievement_name  
- level  
- year  
- created_at  
- updated_at  

## 38. trainings
- id (PK)
- name  
- provider  
- start_date  
- end_date  
- created_at  
- updated_at  

## 39. training_participants
- id (PK)
- student_id (FK → students.id)
- training_id (FK → trainings.id)
- attendance_status  
- certificate  
- created_at  
- updated_at  

## 40. activity_logs
- id (PK)
- user_id (FK → users.id)
- action  
- ip_address  
- timestamp  
- created_at  
- updated_at  

## 41. data_change_history
- id (PK)
- user_id (FK → users.id)
- affected_table  
- action (insert/update/delete)  
- change_timestamp  
- created_at  
- updated_at  
