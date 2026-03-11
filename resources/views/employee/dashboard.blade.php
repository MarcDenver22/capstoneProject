@extends('layouts.employee')

@section('content')

<!-- Welcome Banner -->
<div class="rounded-2xl p-6 mb-6 text-white" style="background: linear-gradient(135deg, #0d9488, #0f766e);">
    <p class="text-sm font-medium opacity-80 mb-1">Welcome</p>
    <h2 class="text-2xl font-bold mb-1">{{ $employee['name'] }}</h2>
    <p class="text-sm opacity-80">{{ $employee['position'] }} &middot; {{ $employee['department'] }}</p>
    <p class="text-sm opacity-70 mt-1">Faculty ID: {{ $employee['faculty_id'] }}</p>
</div>

<!-- Stat Cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6">

    <!-- Total Hours -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 flex items-center gap-4 border-l-4 border-l-indigo-500">
        <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center flex-shrink-0">
            <i class="fas fa-clock text-indigo-600 text-xl"></i>
        </div>
        <div>
            <p class="text-sm text-gray-500 font-medium">Total Hours</p>
            <p class="text-2xl font-bold text-gray-800">{{ $totalHours }}</p>
        </div>
    </div>

    <!-- Absences -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 flex items-center gap-4 border-l-4 border-l-red-500">
        <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center flex-shrink-0">
            <i class="fas fa-calendar-times text-red-600 text-xl"></i>
        </div>
        <div>
            <p class="text-sm text-gray-500 font-medium">Absences</p>
            <p class="text-2xl font-bold text-gray-800">{{ $absences }}</p>
        </div>
    </div>

</div>

<!-- Two-Column Section -->
<div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

    <!-- Attendance Records (wider) -->
    <div class="xl:col-span-2 bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <h2 class="text-lg font-bold text-gray-800 mb-4">
            <i class="fas fa-calendar-check text-indigo-500 mr-2"></i>Attendance Records
        </h2>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-gray-200">
                        <th class="text-left py-3 px-4 font-semibold text-gray-600">DATE</th>
                        <th class="text-left py-3 px-4 font-semibold text-gray-600">TIME IN</th>
                        <th class="text-left py-3 px-4 font-semibold text-gray-600">TIME OUT</th>
                        <th class="text-left py-3 px-4 font-semibold text-gray-600">HOURS</th>
                        <th class="text-left py-3 px-4 font-semibold text-gray-600">STATUS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($attendanceRecords as $record)
                    <tr class="border-b border-gray-50 hover:bg-gray-50 transition">
                        <td class="py-3 px-4 text-gray-700">{{ $record['date'] }}</td>
                        <td class="py-3 px-4 text-gray-600">{{ $record['time_in'] }}</td>
                        <td class="py-3 px-4 text-gray-600">{{ $record['time_out'] }}</td>
                        <td class="py-3 px-4 text-gray-600">{{ $record['hours'] }}</td>
                        <td class="py-3 px-4">
                            @if ($record['status'] === 'Late')
                                <span class="bg-red-100 text-red-700 text-xs font-semibold px-2.5 py-0.5 rounded-full">Late</span>
                            @else
                                <span class="bg-green-100 text-green-700 text-xs font-semibold px-2.5 py-0.5 rounded-full">On Time</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Right Column -->
    <div class="flex flex-col gap-6">

        <!-- My Leave Requests -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <h2 class="text-lg font-bold text-gray-800 mb-4">
                <i class="fas fa-file-alt text-indigo-500 mr-2"></i>My Leave Requests
            </h2>
            <div class="space-y-3">
                @foreach ($leaveRequests as $leave)
                <div class="border border-gray-100 rounded-xl p-4 hover:shadow-sm transition">
                    <div class="flex items-center justify-between mb-1">
                        <span class="font-semibold text-gray-800 text-sm">{{ $leave['type'] }}</span>
                        @if ($leave['status'] === 'Pending')
                            <span class="bg-yellow-100 text-yellow-700 text-xs font-semibold px-2.5 py-0.5 rounded-full">Pending</span>
                        @elseif ($leave['status'] === 'Approved')
                            <span class="bg-green-100 text-green-700 text-xs font-semibold px-2.5 py-0.5 rounded-full">Approved</span>
                        @else
                            <span class="bg-red-100 text-red-700 text-xs font-semibold px-2.5 py-0.5 rounded-full">{{ $leave['status'] }}</span>
                        @endif
                    </div>
                    <p class="text-xs text-gray-400 mb-1">
                        <i class="far fa-calendar mr-1"></i>{{ $leave['date_range'] }}
                    </p>
                    <p class="text-xs text-gray-500">{{ $leave['reason'] }}</p>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Campus Announcements -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <h2 class="text-lg font-bold text-gray-800 mb-4">
                <i class="fas fa-bullhorn text-indigo-500 mr-2"></i>Campus Announcements
            </h2>
            <div class="space-y-3">
                @foreach ($announcements as $announcement)
                <div class="border-l-4 {{ $announcement['border_color'] }} bg-gray-50 rounded-r-xl p-4">
                    <p class="font-semibold text-gray-800 text-sm">{{ $announcement['title'] }}</p>
                    <p class="text-xs text-gray-400 mt-1">
                        <i class="far fa-calendar mr-1"></i>{{ $announcement['date'] }}
                    </p>
                </div>
                @endforeach
            </div>
        </div>

    </div>

</div>

@endsection
