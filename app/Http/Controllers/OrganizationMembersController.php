<?php

namespace App\Http\Controllers;

use App\Models\OrganizationMember;
use App\Models\StudentOrganization;
use App\Models\Student;
use Illuminate\Http\Request;

class OrganizationMembersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data anggota beserta relasinya
        $members = OrganizationMember::with(['organization', 'student'])->get();
        return view('organization_members.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Ambil semua organisasi & mahasiswa untuk dropdown
        $organizations = StudentOrganization::all();
        $students = Student::all();

        return view('organization_members.create', compact('organizations', 'students'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'organization_id' => 'required|exists:student_organizations,id',
            'student_id' => 'required|exists:students,id',
            'position' => 'required|string|max:100',
            'period' => 'required|string|max:20',
        ]);

        // Simpan data baru
        OrganizationMember::create($validated);

        return redirect()->route('organization-members.index')
                         ->with('success', 'Anggota organisasi berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(OrganizationMember $organization_member)
    {
        $organization_member->load(['organization', 'student']);
        return view('organization_members.show', compact('organization_member'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrganizationMember $organization_member)
    {
        $organizations = StudentOrganization::all();
        $students = Student::all();

        return view('organization_members.edit', compact('organization_member', 'organizations', 'students'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OrganizationMember $organization_member)
    {
        $validated = $request->validate([
            'organization_id' => 'required|exists:student_organizations,id',
            'student_id' => 'required|exists:students,id',
            'position' => 'required|string|max:100',
            'period' => 'required|string|max:20',
        ]);

        $organization_member->update($validated);

        return redirect()->route('organization-members.index')
                         ->with('success', 'Data anggota organisasi berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrganizationMember $organization_member)
    {
        $organization_member->delete();

        return redirect()->route('organization-members.index')
                         ->with('success', 'Data anggota organisasi berhasil dihapus!');
    }
}
