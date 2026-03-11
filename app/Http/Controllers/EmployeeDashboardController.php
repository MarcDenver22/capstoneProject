<?php

namespace App\Http\Controllers;

class EmployeeDashboardController extends Controller
{
    public function index()
    {
        if (auth()->user()->role !== 'employee') {
            return redirect()->route('dashboard');
        }

        $employee = [
            'name'       => 'Prof. Juan Dela Cruz',
            'position'   => 'Instructor I',
            'department' => 'Information Technology',
            'faculty_id' => 'FAC-00123',
        ];

        $totalHours = 30;
        $absences   = 2;
        $leaveBalance = 12;
        $onTimeRate = 62;

        $attendanceRecords = [
            ['date' => '2025-03-01', 'time_in' => '08:12 AM', 'time_out' => '05:05 PM', 'hours' => '8.88', 'status' => 'Late'],
            ['date' => '2025-03-02', 'time_in' => '07:58 AM', 'time_out' => '05:00 PM', 'hours' => '9.03', 'status' => 'On Time'],
            ['date' => '2025-03-03', 'time_in' => '08:20 AM', 'time_out' => '05:10 PM', 'hours' => '8.83', 'status' => 'Late'],
            ['date' => '2025-03-04', 'time_in' => '07:55 AM', 'time_out' => '05:00 PM', 'hours' => '9.08', 'status' => 'On Time'],
            ['date' => '2025-03-05', 'time_in' => '08:05 AM', 'time_out' => '05:00 PM', 'hours' => '8.92', 'status' => 'On Time'],
            ['date' => '2025-03-06', 'time_in' => '08:30 AM', 'time_out' => '05:15 PM', 'hours' => '8.75', 'status' => 'Late'],
            ['date' => '2025-03-07', 'time_in' => '07:50 AM', 'time_out' => '05:00 PM', 'hours' => '9.17', 'status' => 'On Time'],
            ['date' => '2025-03-08', 'time_in' => '08:15 AM', 'time_out' => '05:05 PM', 'hours' => '8.83', 'status' => 'Late'],
        ];

        $leaveRequests = [
            [
                'type'       => 'Vacation',
                'status'     => 'Pending',
                'date_range' => 'March 15 – March 17, 2025',
                'reason'     => 'Family vacation trip out of town.',
            ],
            [
                'type'       => 'Sick Request',
                'status'     => 'Approved',
                'date_range' => 'February 20 – February 21, 2025',
                'reason'     => 'Medical check-up and rest due to illness.',
            ],
        ];

        $announcements = [
            [
                'title'        => 'Campus Fest 2025',
                'date'         => 'March 20, 2025',
                'border_color' => 'border-indigo-500',
            ],
            [
                'title'        => 'New Year Orientation',
                'date'         => 'January 6, 2025',
                'border_color' => 'border-red-400',
            ],
            [
                'title'        => 'Teacher Training Seminar',
                'date'         => 'March 22, 2025',
                'border_color' => 'border-green-500',
            ],
        ];

        $schedule = [
            ['date' => '2025-03-12', 'day' => 'Wednesday', 'time' => '07:30 AM – 09:00 AM', 'subject' => 'Introduction to Programming', 'room' => 'IT-101', 'type' => 'Lecture'],
            ['date' => '2025-03-12', 'day' => 'Wednesday', 'time' => '01:00 PM – 03:00 PM', 'subject' => 'Data Structures & Algorithms', 'room' => 'IT-Lab 2', 'type' => 'Lab'],
            ['date' => '2025-03-13', 'day' => 'Thursday',  'time' => '08:00 AM – 09:30 AM', 'subject' => 'Web Development',            'room' => 'IT-102', 'type' => 'Lecture'],
            ['date' => '2025-03-13', 'day' => 'Thursday',  'time' => '10:00 AM – 12:00 PM', 'subject' => 'Web Development',            'room' => 'IT-Lab 1', 'type' => 'Lab'],
            ['date' => '2025-03-14', 'day' => 'Friday',    'time' => '09:00 AM – 10:30 AM', 'subject' => 'Database Management',        'room' => 'IT-103', 'type' => 'Lecture'],
        ];

        return view('employee.dashboard', compact(
            'employee',
            'totalHours',
            'absences',
            'leaveBalance',
            'onTimeRate',
            'attendanceRecords',
            'leaveRequests',
            'announcements',
            'schedule'
        ));
    }
}
