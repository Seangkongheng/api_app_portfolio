<div class="card mt-3">
    <div class="card-body">
        <form action="{{ isset($userEdit->id)? route('user.update',$userEdit->id) : route('user.store' ) }}" method="post">
            @csrf
            @if (isset($userEdit->id))
                @method('PUT')
            @endif
            <label for="">Full Name</label>
            <input type="text" name="name" value="{{ old('name',isset($userEdit->id)?$userEdit->name : '') }}" class="form-control" placeholder="Enter Full name" required>
            <label for="">Email</label>
            <input type="email" name="email" value="{{ old('email',isset($userEdit->id)?$userEdit->email : '') }}" placeholder="Enter Email" class="form-control" required>
            <label for="">Password</label>
            <input type="password" name="password" value="{{ old('password',isset($userEdit->id)? '' : '') }}"  placeholder="Enter Password" class="form-control">
            <label for="">Comfirm Password</label>
            <input type="password" class="form-control" value="{{ old('password_confirmation',isset($userEdit->id)? $userEdit->password_confirmation : '') }}" name="password_confirmation" placeholder="Commfirm your password">
            
            <div class="input-group mb-3 mt-3">
                <select class="custom-select" id="inputGroupSelect02">
                <option selected>Role</option>
                <option value="1">Admin</option>
                </select>
                <div class="input-group-append">
                <label class="input-group-text" for="inputGroupSelect02">Options</label>
                </div>
            </div>
            <button class="btn btn-primary">{{ isset($userEdit->id)?'Update ':'Submit' }}</button>
        </form>
    </div>
</div>