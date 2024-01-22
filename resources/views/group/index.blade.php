@extends('layouts.master')

@section('title', 'Create Group')

@section('contents')
    <div class="p-[100px] bg-base-200">
        <div class="">

            <!-- Form Area -->
            <div class="min-h-screen hidden" id="create-group">
                <div class="flex justify-between">
                    <h3 class="text-indigo-600 font-semibold">Groups</h3>
                    <button onclick="hideCreateGroup()"class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">Cancel</button>
                </div>
                 <div class="ml-[50px] ">
                    <p class="text-gray-800 text-3xl font-semibold">Create new groups</p>
                    <p>FAQ Groups are the base of the FAQ system. You can create as many groups as you want and add
                        faq to them.</p>
                </div>
                <!-- form  -->
                <div class="flex flex-row ml-[50px]">
                    <div class="card shrink-0 w-full max-w-sm shadow-2xl bg-base-100 mt-[50px]">
                        <form class="card-body" method="post" action="{{ route('group.save') }}">
                            @sessionToken
                            <input type="hidden" id="groupid" name="groupid">
                            <div class="form-control">
                                <label class="label"><span class="label-text">Group Name</span></label>
                                <input type="text" id="name" placeholder="Name" name="name" class="input input-bordered" required />
                            </div>
                            <div class="form-control">
                                <label class="label"><span class="label-text">Description</span></label>
                               <textarea id="description" class="textarea textarea-bordered" name="description" placeholder="Description"></textarea>
                            </div>
                            <div class="form-control mt-6">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Table  -->
            <div class="">
                <div class="flex justify-between">
                    <div class="max-w-lg space-y-3">
                        <h3 class="text-indigo-600 font-semibold">Groups</h3>
                        <p class="text-gray-800 text-3xl font-semibold sm:text-4xl">
                            Available groups
                        </p>
                        <p>
                            Here are your available groups. You can edit or delete them.
                        </p>
                    </div>
                    <div>
                        <button onclick="showCreateGroup()"
                            class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                            Create Group
                        </button>
                    </div>
                </div>
                <div class="overflow-x-auto bg-white min-h-screen">
                    <table class="table table-zebra">
                        <thead>
                            <tr>
                                <th>Group Id</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($groups as $group)
                            <tr>
                                <th>{{$group->id}}</th>
                                <td>{{$group->name}}</td>
                                <td>{{$group->description}}</td>
                                <td class="text-right whitespace-nowrap">
                                    <button onclick="editGroup(this)"class="py-1.5 px-3 text-gray-600 hover:text-gray-500 duration-150 hover:bg-gray-50 border rounded-lg"
                                    data-id="{{ $group->id }}" data-name="{{ $group->name }}"
                                    data-description="{{ $group->description }}">Edit</button>
                                            &nbsp;
                                    <a href="{{ URL::tokenRoute('group.faqs', ['groupid' => $group->id]) }}"
                                                class="py-1.5 px-3 text-red-600 hover:text-gray-500 duration-150 hover:bg-red-50 border rounded-lg">FAQs</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        function showCreateGroup() {
            document.getElementById('create-group').classList.remove('hidden');
        }

        function hideCreateGroup() {
            document.getElementById('create-group').classList.add('hidden');
            //clear the values
            document.getElementById('name').value = '';
            document.getElementById('description').value = '';
            document.getElementById('groupid').value = '';
        }

        function editGroup(button) {
            console.log(button.dataset);
            document.getElementById('create-group').classList.remove('hidden');
            //get the data-name, data-description and data-id
            document.getElementById('name').value = button.dataset.name;
            document.getElementById('description').value = button.dataset.description;
            document.getElementById('groupid').value = button.dataset.id;
        }

    </script>
@endpush
