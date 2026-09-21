<label>OSCA ID</label><input name="osca_id" value="{{ old('osca_id',$seniorCitizen->osca_id ?? '') }}" required>
<label>First Name</label><input name="first_name" value="{{ old('first_name',$seniorCitizen->first_name ?? '') }}" required>
<label>Middle Name</label><input name="middle_name" value="{{ old('middle_name',$seniorCitizen->middle_name ?? '') }}">
<label>Last Name</label><input name="last_name" value="{{ old('last_name',$seniorCitizen->last_name ?? '') }}" required>
<label>Birth Date</label><input type="date" name="birth_date" value="{{ old('birth_date',isset($seniorCitizen) ? $seniorCitizen->birth_date?->format('Y-m-d') : '') }}" required>
<label>Sex</label><select name="sex" required><option value="Male">Male</option><option value="Female">Female</option></select>
<label>Barangay</label><input name="barangay" value="{{ old('barangay',$seniorCitizen->barangay ?? '') }}" required>
<label>Address</label><textarea name="address">{{ old('address',$seniorCitizen->address ?? '') }}</textarea>
<label>Contact Number</label><input name="contact_number" value="{{ old('contact_number',$seniorCitizen->contact_number ?? '') }}">
<label><input type="checkbox" name="philhealth" value="1" style="width:auto" @checked(old('philhealth',$seniorCitizen->philhealth ?? false))> PhilHealth</label>
<label>Pension Status</label><input name="pension_status" value="{{ old('pension_status',$seniorCitizen->pension_status ?? '') }}">
