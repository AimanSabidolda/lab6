<?php
use App\Student;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/insert', function () {
    DB::insert('insert into student(name,date_of_birth,gpa,advisor) values(?,?,?,?)',["Aiman",'2001-12-13',4.0,"Aigul"]);
});

Route::get('/select',function(){
$results=DB::select('select * from student where id=?',[1]);
foreach($results as $student){
echo "Name:".$student->name;
echo "<br>";
echo "GPA is:".$student->GPA;
}
});

Route::get('/update',function(){
$updated=DB::update('update student set name="Zere" where id=?',[1]);
return $updated;
});

Route::get('/delete',function(){
$deleted=DB::delete('delete from student where id=?',[1]);
return $deleted;
});


Route::get('/read',function(){
$students=Student::all();
foreach($students as $student){
 echo $student->name;
 echo "<br>";
}
});

Route::get('/find',function(){
$student=Student::find(2);
return $student->name;
});

Route::get('/find1',function(){
$student=Student::where('id',2)->first();
return $student;
});

Route::get('/find3',function(){
$student=Student::where('id',2)->value('name');
return $student;
});

Route::get('/insert2',function(){
$student=new Student;
$student->name="Zere";
$student->date_of_birth='2024-07-12';
$student->GPA=4.0;
$student->advisor="Aisha";
$student->save();
});

Route::get('/basicupdate',function(){
$student=Student::find(3);
$student->name="Hadisha";
$student->date_of_birth='2025-02-13';
$student->save();
});

Route::get('/delete1',function(){
$students=Student::find(2);
$students->delete();
});
Route::get('/destroy',function(){
Student::destroy(4);
});

