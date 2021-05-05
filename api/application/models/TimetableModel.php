<?php

class TimetableModel extends CI_Model {
	 function __construct() {
        parent::__construct();
    }

  
    public function getTeacherDetail($school_id) {
		
        $query = 'SELECT CONCAT(teacher_name, "-", subject1) AS text, udise_staffreg.u_id AS value 
		FROM udise_staffreg 
		JOIN teacher_subjects ON udise_staffreg.subject1 = teacher_subjects.id   
		WHERE udise_staffreg.school_key_id = ' . $school_id;
        $result = $this->db->query($query)->result();
        return $result;
    }
   public function getTeacherlist($school_id) {
	  // print_r($school_id);
		
        $query = 'SELECT teacher_name,u_id 
		FROM udise_staffreg  
		WHERE udise_staffreg.school_key_id = ' . $school_id;
        $result = $this->db->query($query)->result();
        return $result;
    }
	public function getclasslist_section_group($school_id) {
	  // print_r($school_id);
		
        $query = 'SELECT class_id,section 
		FROM schoolnew_section_group	
		WHERE school_key_id = ' . $school_id;
        $result = $this->db->query($query)->result();
        return $result;
    }
	public function get_school_category($school_id)
	{
		$this->db->select('cate_type');
        $this->db->from('students_school_child_count');
        $this->db->where('school_id',$school_id);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
		
		
	}
	public function getclasslist($school_id,$this_week_fst,$this_week_ed) {
	  // print_r($school_id);
		
         $this->db->select('class_id,section');
        $this->db->from('schoolnew_timetable_weekly_classwise');
        $this->db->where('school_id',$school_id);
		$this->db->where('timetable_date >=',$this_week_fst);
		$this->db->where('timetable_date <=',$this_week_ed);
		$this->db->group_by('class_id,section');
		$this->db->order_by('class_id,section');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
	
	////////////////////////////////////
	/*dashboard teacher timetable */
	///////////////////////////////////
	  public function MondayClassDetail($school_id,$teacherid,$this_week_fst,$tablename)
	 {
		//GROUP_CONCAT(schoolnew_section_group.section SEPARATOR ",") as section
		$query ="select concat(class_id,'-',section,'-',short_name)as classes,subjects,master_classid,class_id,section,PT,PS,status from 
       $tablename a
		left join teacher_subjects on a.PS=teacher_subjects.id
		where school_id='".$school_id."' and PT='".$teacherid."' and days=1 and timetable_date='".$this_week_fst."'
        ";
        $result = $this->db->query($query)->result();
        return $result;
	 }
	  public function TuesdayClassDetail($school_id,$teacherid,$this_week_second,$tablename)
	 {
		$query ="select concat(class_id,'-',section,'-',short_name)as classes,master_classid,class_id,section,PT,PS,status from 
        $tablename a
		left join teacher_subjects on a.PS=teacher_subjects.id where school_id='".$school_id."' and PT='".$teacherid."' and days=2
		and timetable_date='".$this_week_second."'
        ";
        $result = $this->db->query($query)->result();
        return $result;
	 }
	  public function WednesdayClassDetail($school_id,$teacherid,$this_week_third,$tablename)
	 {
		$query ="select concat(class_id,'-',section,'-',short_name)as classes,master_classid,class_id,section,PT,PS,status from 
        $tablename a
		left join teacher_subjects on a.PS=teacher_subjects.id 
		where school_id='".$school_id."' and PT='".$teacherid."' and days=3
		and timetable_date='".$this_week_third."'
        ";
        $result = $this->db->query($query)->result();
        return $result;
	 }
	  public function ThursdayClassDetail($school_id,$teacherid,$this_week_fourth,$tablename)
	 {
		$query ="select concat(class_id,'-',section,'-',short_name)as classes,master_classid,class_id,section,PT,PS,status from 
         $tablename a
		left join teacher_subjects on a.PS=teacher_subjects.id
		where school_id='".$school_id."' and PT='".$teacherid."' and days=4
		and timetable_date='".$this_week_fourth."'
        ";
        $result = $this->db->query($query)->result();
        return $result;
	 }
	  public function FridayClassDetail($school_id,$teacherid,$this_week_fifth,$tablename)
	 {
		$query ="select concat(class_id,'-',section,'-',short_name)as classes,master_classid,class_id,section,PT,PS,status from 
         $tablename a
		left join teacher_subjects on a.PS=teacher_subjects.id
		where school_id='".$school_id."' and PT='".$teacherid."' and days=5
		and timetable_date='".$this_week_fifth."'
        ";
        $result = $this->db->query($query)->result();
        return $result;
	 }
	  public function SaturdayClassDetail($school_id,$teacherid,$this_week_sixth,$tablename)
	 {
		$query ="select concat(class_id,'-',section,'-',short_name)as classes,master_classid,class_id,section,PT,PS,status from 
         $tablename a 
		left join teacher_subjects on a.PS=teacher_subjects.id
		where school_id='".$school_id."' and PT='".$teacherid."' and days=6
		and timetable_date='".$this_week_sixth."'
        ";
        $result = $this->db->query($query)->result();
        return $result;
	 }
	  public function SundayClassDetail($school_id,$teacherid,$this_week_ed,$tablename)
	 {
		$query ="select concat(class_id,'-',section,'-',short_name)as classes,master_classid,class_id,section,PT,PS,status from 
         $tablename a  
		left join teacher_subjects on a.PS=teacher_subjects.id
		where school_id='".$school_id."' and PT='".$teacherid."' and days=7
		and timetable_date='".$this_week_ed."'
        ";
        $result = $this->db->query($query)->result();
        return $result;
	 }
	 ////////////////////////////
	 /*End of Teacher Time table */
	 ///////////////////////////
	  
	  public function AssignClasscount($school_id,$teacherid,$this_week_fst,$this_week_ed)
	 {		
		$this->db->select('count(*)as teacher_count,teacher_name');
        $this->db->from('schoolnew_timetable_weekly_classwise');
		$this->db->join('udise_staffreg','schoolnew_timetable_weekly_classwise.school_id=udise_staffreg.school_key_id and schoolnew_timetable_weekly_classwise.PT=udise_staffreg.teacher_code','left');
        $this->db->where('school_id',$school_id);
		$this->db->where('PT',"$teacherid");
		$this->db->where('timetable_date >=',$this_week_fst);
		$this->db->where('timetable_date <=',$this_week_ed);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
	 
	 }
  
    public function getSectionDetail($className, $school_id) {
        $this->db->select('DISTINCT(section) AS text');
        $this->db->from('schoolnew_section_group');
        $this->db->where('school_key_id', $school_id);
        $this->db->where('class_id', $className);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function getSchoolDetail($school_id) {
        $this->db->select(' * ');
        $this->db->from('schoolnew_basicinfo');
        $this->db->where('school_id', $school_id);
        //$this->db->group_by('udise_code');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function getPeriodAlllocSubjectDetails($loginName, $classNumber, $term) {
		 
        $query = 'SELECT teacher_name, subject1, subjects, IFNULL(tpdhourcount, 0) AS period FROM udise_staffreg 
		JOIN teacher_subjects ON teacher_subjects.id = udise_staffreg.subject1 LEFT 
		JOIN termwiseperiodallocationdetails ON termwiseperiodallocationdetails.tpdsubject  = teacher_subjects.id 
		and tpdclass = ' . $classNumber . ' 
		and tpdterm = ' . $term . ' 
		where udise_code = (select udise_code from schoolnew_basicinfo 
		WHERE schoolnew_basicinfo.udise_code = ' . $loginName . ' )
		group by subjects';
        $result = $this->db->query($query)->result();
        return $result;
    }
	 

    public function getPeriodTimeAlllocDetails($loginName,$classNumber,$term) {
		
        $query = 'SELECT tfepdid, tfepdperiodno, tfepdstarttime, tfepdendtime, tfepdduration FROM timeforeachperioddetails  WHERE tfepdcreatedby = ' . $loginName . ' AND tfepdclass = ' . $classNumber . ' and tfepdterm = ' . $term;
        $result = $this->db->query($query)->result();
        return $result;
    }

    

    public function getSchoolIdUsingUdisecode($school_id, $selClass,$section) {
        $query = 'SELECT id FROM schoolnew_section_group WHERE school_key_id = ' . $school_id . ' AND section = "' . $section . '" AND class_id = ' . $selClass;
        $result = $this->db->query($query)->result();
        return $result;
    }

    public function getSchoolIdUsingUdisecodeAndClass($school_id, $selClass) {
        $query = 'SELECT class_id FROM schoolnew_section_group WHERE school_key_id = ' . $school_id . '  AND class_id = ' . $selClass;
        $result = $this->db->query($query)->result();
        return $result;
    }
	
    public function getClassDetail($school_id) {
		//$school_id=3509;
		$class = array(13,14,15);
        $this->db->select('schoolnew_section_group.class_id AS value
		,schoolnew_section_group.section,schoolnew_section_group.id,GROUP_CONCAT(schoolnew_section_group.section SEPARATOR ",") as section');
        $this->db->from('schoolnew_section_group');
		 //$this->db->join('schoolnew_timetable_configuration','schoolnew_section_group.class_id = schoolnew_timetable_configuration.class_id and schoolnew_section_group.school_key_id=schoolnew_timetable_configuration.school_id','LEFT');
		$this->db->where_not_in('schoolnew_section_group.class_id',$class );
        $this->db->where('schoolnew_section_group.school_key_id',$school_id);
		$this->db->group_by('schoolnew_section_group.class_id');
		$this->db->order_by('schoolnew_section_group.class_id');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
	
	
	
	
	public function getperoids($school_id,$classid)
	{
	$this->db->select('no_of_periods as periods_count');
        $this->db->from('schoolnew_section_group');
        $this->db->where('school_key_id',$school_id);
		//$this->db->where('term_id',$termid);
		$this->db->where('class_id',$classid);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    public function getClassid($school_id,$classid,$sectionid){
        $this->db->select('id');
        $this->db->from('schoolnew_section_group');
        $this->db->where('school_key_id',$school_id);
		$this->db->where('class_id',$classid);
		$this->db->where('section',$sectionid);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }	
	public function timetable_count_data($school_id,$classid,$sectionid)
	{
		
		$this->db->select('count(days)as countdata');
        $this->db->from('schoolnew_timetable_term_classwise');
        $this->db->where('school_id',$school_id);
		$this->db->where('class_id',$classid);
		$this->db->where('section',$sectionid);
		$this->db->group_by('days');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
		
	}
	public function weektimetable_count_data($school_id,$this_week_fst,$classid,$sectionid,$tablename)
	{
		
		$this->db->select('count(days)as countdata');
        $this->db->from($tablename);
        $this->db->where('school_id',$school_id);
		//$this->db->where('term_id',$term);
		$this->db->where('class_id',$classid);
		$this->db->where('section',$sectionid);
		$this->db->where('timetable_date',$this_week_fst);
		$this->db->group_by('days');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
		
	}
	public function dailyimetable_count_data($school_id,$today,$classid,$sectionid)
	{
		
		$this->db->select('count(days)as countdata');
        $this->db->from('schoolnew_timetable_daily_classwise');
        $this->db->where('school_id',$school_id);
		//$this->db->where('term_id',$term);
		$this->db->where('class_id',$classid);
		$this->db->where('section',$sectionid);
		$this->db->where('timetable_date',$today);
		$this->db->group_by('days');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
		
	}
	
	public function timetable_data_delete($school_id,$classid,$sectionid)
	{
		$this->db->where('school_id',$school_id);
		$this->db->where('class_id',$classid);
		$this->db->where('section',$sectionid);
        $this->db->delete('schoolnew_timetable_term_classwise');
        return $this->db->insert_id();
	}
	
	public function weektimetable_data_delete($school_id,$classid,$sectionid,$this_week_fst,$this_week_ed,$tablename)
	{
		$this->db->where('school_id',$school_id);
		//$this->db->where('term_id',$term);
		$this->db->where('class_id',$classid);
		$this->db->where('section',$sectionid);
		$this->db->where('timetable_date >=',$this_week_fst);
		$this->db->where('timetable_date <=',$this_week_ed);
        $this->db->delete($tablename);
        return $this->db->insert_id();
	}
	
	public function dailytimetable_data_delete($school_id,$classid,$sectionid,$today)
	{
		$this->db->where('school_id',$school_id);
		//$this->db->where('term_id',$term);
		$this->db->where('class_id',$classid);
		$this->db->where('section',$sectionid);
		$this->db->where('timetable_date',$today);
        $this->db->delete('schoolnew_timetable_daily_classwise');
        return $this->db->insert_id();
	}
	
	public function teacher_checking($teacher_code)
	{
	$this->db->select('count(teacher_code) as number');
        $this->db->from('teachers_assigned_class');

        $this->db->where('teacher_code', $teacher_code);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }	
	
	 public function getteachers($school_id) {
		 
		// $school_id=3509;
		$currentdate=date("Y-m-d");
		 $sql= "SELECT  a.*, b.short_name as subjects,b.id  FROM 
(SELECT school_key_id,u_id,subject1,subject2,subject3,subject4,subject5,subject6,teacher_code,teacher_name
FROM udise_staffreg WHERE school_key_id=".$school_id." and udise_staffreg.archive=1 )a
JOIN teacher_subjects b ON a.subject1 = b.`id`
UNION 

SELECT a.*, c.short_name as subjects,c.id FROM 
(SELECT school_key_id,u_id,subject1,subject2,subject3,subject4,subject5,subject6,teacher_code,teacher_name
FROM udise_staffreg WHERE school_key_id=".$school_id." and udise_staffreg.archive=1)a 
JOIN teacher_subjects c ON a.subject2 = c.id

UNION 

SELECT a.*,d.short_name as subjects,d.id FROM 
(SELECT school_key_id,u_id,subject1,subject2,subject3,subject4,subject5,subject6,teacher_code,teacher_name
FROM udise_staffreg WHERE school_key_id=".$school_id." and udise_staffreg.archive=1 )a
JOIN teacher_subjects d ON a.subject3 = d.id

UNION

SELECT  a.*, e.short_name as subjects,e.id FROM 
(SELECT school_key_id,u_id,subject1,subject2,subject3,subject4,subject5,subject6,teacher_code,teacher_name
FROM udise_staffreg WHERE school_key_id=".$school_id." and udise_staffreg.archive=1 )a
JOIN teacher_subjects e ON a.subject4 = e.id


UNION

SELECT  a.*,f.short_name as subjects,f.id FROM 
(SELECT school_key_id,u_id,subject1,subject2,subject3,subject4,subject5,subject6,teacher_code,teacher_name
FROM udise_staffreg WHERE school_key_id=".$school_id." and udise_staffreg.archive=1)a
JOIN teacher_subjects f ON a.subject5 = f.id 

UNION

SELECT a.*,g.short_name as subjects,g.id FROM 
(SELECT school_key_id,u_id,subject1,subject2,subject3,subject4,subject5,subject6,teacher_code,teacher_name
FROM udise_staffreg WHERE school_key_id=".$school_id." and udise_staffreg.archive=1 )a
JOIN teacher_subjects g ON a.subject6 = g.id
order by subjects 
;";
				$query = $this->db->query($sql);
				//print_r($this->db->last_query());die;
                 return $query->result();
    }
	
		 public function getvolunteerteachers($school_id) {
		 
		// $school_id=3509;
		$currentdate=date("Y-m-d");
		 $sql= "SELECT  a.*, b.short_name as subjects,b.id  FROM 
(
SELECT school_key_id,id,sub1,sub2,sub3,sub4,sub5,sub6,teacher_id,teacher_name
FROM teacher_volunteers_subjects WHERE school_key_id=".$school_id." and (to_date >='".$currentdate."' or to_date='0000-00-00')and teacher_code is null) a

JOIN teacher_subjects b ON a.sub1 = b.id
UNION 

SELECT a.*, c.short_name as subjects,c.id FROM 
(
SELECT school_key_id,id,sub1,sub2,sub3,sub4,sub5,sub6,teacher_id,teacher_name
FROM teacher_volunteers_subjects WHERE school_key_id=".$school_id." and (to_date >='".$currentdate."' or to_date='0000-00-00')and teacher_code is null) a

 JOIN teacher_subjects c ON a.sub2 = c.id


UNION 

SELECT a.*,d.short_name as subjects,d.id FROM 
(
SELECT school_key_id,id,sub1,sub2,sub3,sub4,sub5,sub6,teacher_id,teacher_name
FROM teacher_volunteers_subjects WHERE school_key_id=".$school_id." and (to_date >='".$currentdate."' or to_date='0000-00-00') and teacher_code is null) a
JOIN teacher_subjects d ON a.sub3 = d.id

UNION

SELECT  a.*, e.short_name as subjects,e.id FROM 
(
SELECT school_key_id,id,sub1,sub2,sub3,sub4,sub5,sub6,teacher_id,teacher_name
FROM teacher_volunteers_subjects WHERE school_key_id=".$school_id." and (to_date >='".$currentdate."' or to_date='0000-00-00') and teacher_code  is null) a
JOIN teacher_subjects e ON a.sub4 = e.id

UNION

SELECT  a.*,f.short_name as subjects,f.id FROM 
(
SELECT school_key_id,id,sub1,sub2,sub3,sub4,sub5,sub6,teacher_id,teacher_name
FROM teacher_volunteers_subjects WHERE school_key_id=".$school_id." and (to_date >='".$currentdate."' or to_date='0000-00-00')and teacher_code is null) a
JOIN teacher_subjects f ON a.sub5 = f.id

UNION

SELECT a.*,g.short_name as subjects,g.id FROM 
(
SELECT school_key_id,id,sub1,sub2,sub3,sub4,sub5,sub6,teacher_id,teacher_name
FROM teacher_volunteers_subjects WHERE school_key_id=".$school_id." and (to_date >='".$currentdate."' or to_date='0000-00-00') and teacher_code is null) a
 JOIN teacher_subjects g ON a.sub6 = g.id
 order by subjects 
;";
				$query = $this->db->query($sql);
				//print_r($this->db->last_query());die;
                 return $query->result();
    }
	
		 public function getdeputationteachers($school_id) {
		 
		// $school_id=3509;
		$currentdate=date("Y-m-d");
		 $sql= "SELECT  a.*, b.short_name as subjects,b.id  FROM 
(
SELECT school_key_id,id,sub1,sub2,sub3,sub4,sub5,sub6,teacher_code,teacher_name
FROM teacher_volunteers_subjects WHERE school_key_id=".$school_id." and (to_date >='".$currentdate."' or to_date='0000-00-00') and teacher_id is null) a

JOIN teacher_subjects b ON a.sub1 = b.id
UNION 

SELECT a.*, c.short_name as subjects,c.id FROM 
(
SELECT school_key_id,id,sub1,sub2,sub3,sub4,sub5,sub6,teacher_code,teacher_name
FROM teacher_volunteers_subjects WHERE school_key_id=".$school_id." and (to_date >='".$currentdate."' or to_date='0000-00-00')and teacher_id is null) a

 JOIN teacher_subjects c ON a.sub2 = c.id


UNION 

SELECT a.*,d.short_name as subjects,d.id FROM 
(
SELECT school_key_id,id,sub1,sub2,sub3,sub4,sub5,sub6,teacher_code,teacher_name
FROM teacher_volunteers_subjects WHERE school_key_id=".$school_id." and (to_date >='".$currentdate."' or to_date='0000-00-00')and teacher_id is null) a
JOIN teacher_subjects d ON a.sub3 = d.id

UNION

SELECT  a.*, e.short_name as subjects,e.id FROM 
(
SELECT school_key_id,id,sub1,sub2,sub3,sub4,sub5,sub6,teacher_code,teacher_name
FROM teacher_volunteers_subjects WHERE school_key_id=".$school_id." and (to_date >='".$currentdate."' or to_date='0000-00-00')and teacher_id is null) a
JOIN teacher_subjects e ON a.sub4 = e.id

UNION

SELECT  a.*,f.short_name as subjects,f.id FROM 
(
SELECT school_key_id,id,sub1,sub2,sub3,sub4,sub5,sub6,teacher_code,teacher_name
FROM teacher_volunteers_subjects WHERE school_key_id=".$school_id." and (to_date >='".$currentdate."' or to_date='0000-00-00')and teacher_id is null) a
JOIN teacher_subjects f ON a.sub5 = f.id

UNION

SELECT a.*,g.short_name as subjects,g.id FROM 
(
SELECT school_key_id,id,sub1,sub2,sub3,sub4,sub5,sub6,teacher_code,teacher_name
FROM teacher_volunteers_subjects WHERE school_key_id=".$school_id." and (to_date >='".$currentdate."' or to_date='0000-00-00')and teacher_id is null) a
 JOIN teacher_subjects g ON a.sub6 = g.id
order by subjects 
;";
				$query = $this->db->query($sql);
				//print_r($this->db->last_query());die;
                 return $query->result();
    }
	
	public function gettodayteachers($school_id) {
		$currentdate=date("Y-m-d");
		$sql= "SELECT a.*, b.short_name as subjects ,b.id  FROM 
(SELECT school_key_id,u_id,subject1,subject2,subject3,subject4,subject5,subject6,udise_staffreg.teacher_code,udise_staffreg.teacher_name,teachers_attend_daily.attstatus
FROM udise_staffreg 
LEFT JOIN teachers_attend_daily on udise_staffreg.teacher_code =teachers_attend_daily.teacher_code
and teachers_attend_daily.date='".$currentdate."'
WHERE udise_staffreg.school_key_id=".$school_id." and udise_staffreg.archive=1 
) a
JOIN teacher_subjects b ON a.subject1 = b.id

UNION 

SELECT  a.*, c.short_name as subjects,c.id FROM 
(SELECT school_key_id,u_id,subject1,subject2,subject3,subject4,subject5,subject6,udise_staffreg.teacher_code,udise_staffreg.teacher_name,teachers_attend_daily.attstatus
FROM udise_staffreg 
LEFT JOIN teachers_attend_daily on udise_staffreg.teacher_code =teachers_attend_daily.teacher_code
and teachers_attend_daily.date='".$currentdate."'
WHERE udise_staffreg.school_key_id=".$school_id." and udise_staffreg.archive=1 
)a

 JOIN teacher_subjects c ON a.subject2 = c.id


UNION 

SELECT  a.*, d.short_name as subjects,d.id FROM 
(SELECT school_key_id,u_id,subject1,subject2,subject3,subject4,subject5,subject6,udise_staffreg.teacher_code,udise_staffreg.teacher_name,teachers_attend_daily.attstatus
FROM udise_staffreg 
LEFT JOIN teachers_attend_daily on udise_staffreg.teacher_code =teachers_attend_daily.teacher_code
and teachers_attend_daily.date='".$currentdate."'
WHERE udise_staffreg.school_key_id=".$school_id." and udise_staffreg.archive=1 
) a
JOIN teacher_subjects d ON a.subject3 = d.id

UNION

SELECT a.*, e.short_name as subjects,e.id FROM 
(SELECT school_key_id,u_id,subject1,subject2,subject3,subject4,subject5,subject6,udise_staffreg.teacher_code,udise_staffreg.teacher_name,teachers_attend_daily.attstatus
FROM udise_staffreg 
LEFT JOIN teachers_attend_daily on udise_staffreg.teacher_code =teachers_attend_daily.teacher_code
and teachers_attend_daily.date='".$currentdate."'
WHERE udise_staffreg.school_key_id=".$school_id." and udise_staffreg.archive=1 
) a
JOIN teacher_subjects e ON a.subject4 = e.id

UNION

SELECT  a.*, f.short_name as subjects,f.id FROM 
(SELECT school_key_id,u_id,subject1,subject2,subject3,subject4,subject5,subject6,udise_staffreg.teacher_code,udise_staffreg.teacher_name,teachers_attend_daily.attstatus
FROM udise_staffreg 
LEFT JOIN teachers_attend_daily on udise_staffreg.teacher_code =teachers_attend_daily.teacher_code
and teachers_attend_daily.date='".$currentdate."'
WHERE udise_staffreg.school_key_id=".$school_id." and udise_staffreg.archive=1 
) a
 JOIN teacher_subjects f ON a.subject5 = f.id

UNION

SELECT  a.*,g.short_name as subjects,g.id FROM 
(SELECT school_key_id,u_id,subject1,subject2,subject3,subject4,subject5,subject6,udise_staffreg.teacher_code,udise_staffreg.teacher_name,teachers_attend_daily.attstatus
FROM udise_staffreg 
LEFT JOIN teachers_attend_daily on udise_staffreg.teacher_code =teachers_attend_daily.teacher_code
and teachers_attend_daily.date='".$currentdate."'
WHERE udise_staffreg.school_key_id=".$school_id." and udise_staffreg.archive=1 
) a
 JOIN teacher_subjects g ON a.subject6 = g.id

;";
				$query = $this->db->query($sql);
				//print_r($this->db->last_query());die;
                 return $query->result();
    }
	
	
	
	/************************************/
	    /* Term Time Table  Data Insert*/
	/************************************/
	function teacher_assign_class_timetable_monday($savemonday)
	{
	 $this->db->insert('schoolnew_timetable_term_classwise',$savemonday); 
     return $this->db->insert_id();	
	}
	
	function teacher_assign_class_timetable_tuesday($savetuesday)
	{
	 $this->db->insert('schoolnew_timetable_term_classwise',$savetuesday); 
     return $this->db->insert_id();	
	}
	
	function teacher_assign_class_timetable_wednesday($savewednesday)
	{
	 $this->db->insert('schoolnew_timetable_term_classwise',$savewednesday); 
     return $this->db->insert_id();		
	}
	
	function teacher_assign_class_timetable_thursday($savethursday)
	{
	 $this->db->insert('schoolnew_timetable_term_classwise',$savethursday); 
     return $this->db->insert_id();		
	}
	
	function teacher_assign_class_timetable_friday($savefriday)
	{
	 $this->db->insert('schoolnew_timetable_term_classwise',$savefriday); 
     return $this->db->insert_id();		
	}
	function teacher_assign_class_timetable_saturday($savesaturday)
	{
	 $this->db->insert('schoolnew_timetable_term_classwise',$savesaturday); 
     return $this->db->insert_id();		
	}
	function teacher_assign_class_timetable_sunday($savesunday)
	{
	 $this->db->insert('schoolnew_timetable_term_classwise',$savesunday); 
     return $this->db->insert_id();		
	}
	/************************************/
	 /*   End of Term Time Table       */
	/************************************/
	
	
	
	/************************************/
	    /* Term Time Table Data Get */  
	/************************************/
	function getclass_autoid($school_id,$classid,$sectionid)
	{
		$this->db->distinct();
		$this->db->select('id');
        $this->db->from('schoolnew_section_group');
        $this->db->where('school_key_id',$school_id);
		$this->db->where('class_id',$classid);
		$this->db->where('section',$sectionid);
        $query = $this->db->get();
	    $result = $query->first_row();
		// $result = $query->result();
        return $result->id;
	}
	function gettimetable_data_monday($school_id,$classid,$sectionid)
	{
		
		$this->db->select('*');
        $this->db->from('schoolnew_timetable_term_classwise');
        $this->db->where('school_id',$school_id);
		$this->db->where('class_id',$classid);
		$this->db->where('section',$sectionid);
		$this->db->where('days',1);
        $query = $this->db->get();
	    $result = $query->result();
        return $result;
	}
	
	function gettimetable_data_tuesday($school_id,$classid,$sectionid)
	{
		$this->db->select('*');
        $this->db->from('schoolnew_timetable_term_classwise');
        $this->db->where('school_id',$school_id);
		$this->db->where('class_id',$classid);
		$this->db->where('section',$sectionid);
		$this->db->where('days',2);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
		
	}
	function gettimetable_data_wednesday($school_id,$classid,$sectionid)
	{
		$this->db->select('*');
        $this->db->from('schoolnew_timetable_term_classwise');
        $this->db->where('school_id',$school_id);
		$this->db->where('class_id',$classid);
		$this->db->where('section',$sectionid);
		$this->db->where('days',3);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
		
	}
	function gettimetable_data_thursday($school_id,$classid,$sectionid)
	{
		$this->db->select('*');
        $this->db->from('schoolnew_timetable_term_classwise');
        $this->db->where('school_id',$school_id);
		$this->db->where('class_id',$classid);
		$this->db->where('section',$sectionid);
		$this->db->where('days',4);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
		
	}
	function gettimetable_data_friday($school_id,$classid,$sectionid)
	{
		$this->db->select('*');
        $this->db->from('schoolnew_timetable_term_classwise');
        $this->db->where('school_id',$school_id);
		$this->db->where('class_id',$classid);
		$this->db->where('section',$sectionid);
		$this->db->where('days',5);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
		
	}
	function gettimetable_data_saturday($school_id,$classid,$sectionid)
	{
		$this->db->select('*');
        $this->db->from('schoolnew_timetable_term_classwise');
        $this->db->where('school_id',$school_id);
		$this->db->where('class_id',$classid);
		$this->db->where('section',$sectionid);
		$this->db->where('days',6);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
	}
	function gettimetable_data_sunday($school_id,$classid,$sectionid)
	{
		$this->db->select('*');
        $this->db->from('schoolnew_timetable_term_classwise');
        $this->db->where('school_id',$school_id);
		$this->db->where('class_id',$classid);
		$this->db->where('section',$sectionid);
		$this->db->where('days',7);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
	}
	
	/************************************/
	    /* End of Term Time Table get data */
	/************************************/
	
	
	
	/************************************/
	/* Weekly Time Table  Data Insert*/
	/************************************/
	function teacher_assign_class_weeklytable_monday($savemonday,$tablename)
	{	
	 $this->db->insert($tablename,$savemonday); 
     return $this->db->insert_id();	
	}
	
	function teacher_assign_class_weeklytable_tuesday($savetuesday,$tablename)
	{
	 $this->db->insert($tablename,$savetuesday); 
     return $this->db->insert_id();	
	}
	
	function teacher_assign_class_weeklytable_wednesday($savewednesday,$tablename)
	{
	 $this->db->insert($tablename,$savewednesday); 
     return $this->db->insert_id();		
	}
	
	function teacher_assign_class_weeklytable_thursday($savethursday,$tablename)
	{
	 $this->db->insert($tablename,$savethursday); 
     return $this->db->insert_id();		
	}
	
	function teacher_assign_class_weeklytable_friday($savefriday,$tablename)
	{
	 $this->db->insert($tablename,$savefriday); 
     return $this->db->insert_id();		
	}
	function teacher_assign_class_weeklytable_saturday($savesaturday,$tablename)
	{
	 $this->db->insert($tablename,$savesaturday); 
     return $this->db->insert_id();		
	}
	function teacher_assign_class_weeklytable_sunday($savesunday,$tablename)
	{
	 $this->db->insert($tablename,$savesunday); 
     return $this->db->insert_id();		
	}
	/************************************/
	 /*   End of Week Time Table       */
	/************************************/
	
	/************************************/
	/* Weekly Time Table  Data Insert*/
	/************************************/
	function teacher_assign_class_dailytable_monday($savemonday)
	{	
	 $this->db->insert('schoolnew_timetable_daily_classwise',$savemonday); 
     return $this->db->insert_id();	
	}
	
	function teacher_assign_class_dailytable_tuesday($savetuesday)
	{
	 $this->db->insert('schoolnew_timetable_daily_classwise',$savetuesday); 
     return $this->db->insert_id();	
	}
	
	function teacher_assign_class_dailytable_wednesday($savewednesday)
	{
	 $this->db->insert('schoolnew_timetable_daily_classwise',$savewednesday); 
     return $this->db->insert_id();		
	}
	
	function teacher_assign_class_dailytable_thursday($savethursday)
	{
	 $this->db->insert('schoolnew_timetable_daily_classwise',$savethursday); 
     return $this->db->insert_id();		
	}
	
	function teacher_assign_class_dailytable_friday($savefriday)
	{
	 $this->db->insert('schoolnew_timetable_daily_classwise',$savefriday); 
     return $this->db->insert_id();		
	}
	function teacher_assign_class_dailytable_saturday($savesaturday)
	{
	 $this->db->insert('schoolnew_timetable_daily_classwise',$savesaturday); 
     return $this->db->insert_id();		
	}
	function teacher_assign_class_dailytable_sunday($savesunday)
	{
	 $this->db->insert('schoolnew_timetable_daily_classwise',$savesunday); 
     return $this->db->insert_id();		
	}
	/************************************/
	 /*   End of Week Time Table       */
	/************************************/
	
	
	
	/************************************/
	    /* week Time Table Data Get */
	/************************************/
	function getmarked_timetable($school_id,$classid,$sectionid,$this_week_fst)
	{
		$this->db->select('count(PT)as count');
        $this->db->from('schoolnew_timetable_weekly_classwise');
        $this->db->where('school_id',$school_id);
		$this->db->where('class_id',$classid);
		$this->db->where('section',$sectionid);
		$this->db->where('timetable_date',$this_week_fst);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
	}
	function getmarked_term_timetable($school_id,$classid,$sectionid,$term)
	{
	 $this->db->select('count(PT)as count');
        $this->db->from('schoolnew_timetable_term_classwise');
        $this->db->where('school_id',$school_id);
		$this->db->where('class_id',$classid);
		$this->db->where('section',$sectionid);
		$this->db->where('term_id',$term);
        $query = $this->db->get();
        $result = $query->result();
        return $result;	
	}
	function getweektimetable_data_monday($school_id,$classid,$sectionid,$this_week_fst,$tablename)
	{
		
		//print_r($tablename);
		//die();
		//print_r('testing');
		//print_r('sample');
       // die();		
		 $result = $this->db->get_where($tablename,array('school_id'=>$school_id,'class_id'=>$classid,'section'=>$sectionid,'timetable_date'=>$this_week_fst))->result();
		
			$time_table_arr = [];
			
		if(!empty($result))
		{
				$leave_result = $this->db->get_where('schoolnew_school_assign_holidays',array('leavedate'=>$this_week_fst))->result();
					
				foreach($result as $time_index => $period_result)
				{
					 if(!empty($leave_result))
					   { 
							foreach($leave_result as $leave){
								// echo $leave->periods;
								if($leave->periods == $period_result->status)
								{
									$result[$time_index]->PS ='';
									$result[$time_index]->PT ='';
								}else
								{
									
								  	
								}	
							}
					    }
						$fullday_leave = $this->db->get_where('schoolnew_school_assign_holidays',array('school_id'=>$school_id,'class_id'=>$classid,'section'=>$sectionid,'leavedate'=>$this_week_fst,'leavestatus'=>'FD'))->result();
					if(!empty($fullday_leave))	
					{
						for($i=0;$i<=7;$i++)	
		             {
							 $result[$i]->PS = '';
							 $result[$i]->PT ='';
		             }
					}
					$fullschool_leave = $this->db->get_where('schoolnew_school_assign_holidays',array('school_id'=>$school_id,'leavedate'=>$this_week_fst,'leavestatus'=>'FS'))->result();
					if(!empty($fullschool_leave))	
					{
						for($i=0;$i<=7;$i++)	
		             {
							 $result[$i]->PS = '';
							 $result[$i]->PT ='';
		             }
					}
					
						
				}
		}
		
		else
		{
			
			$fullday_leave = $this->db->get_where('schoolnew_school_assign_holidays',array('school_id'=>$school_id,'class_id'=>$classid,'section'=>$sectionid,'leavedate'=>$this_week_fst,'leavestatus'=>'FD'))->result();
			$fullschool_leave = $this->db->get_where('schoolnew_school_assign_holidays',array('school_id'=>$school_id,'leavedate'=>$this_week_fst,'leavestatus'=>'FS'))->result();
			$leave_result=$this->db->get_where('schoolnew_school_assign_holidays',array('school_id'=>$school_id,'class_id'=>$classid,'section'=>$sectionid,'leavedate'=>$this_week_fst))->result();
			//print_r($leave_result);
		    if(!empty($fullday_leave))	
					{
						
						for($i=0;$i<=7;$i++)	
		             {
							 $result[$i]['PS'] = '';
							 $result[$i]['PT']='';
		             }
					
					}
					else if(!empty($fullschool_leave))	
					{
						
						for($i=0;$i<=7;$i++)	
		             {
							 $result[$i]['PS'] = '';
							 $result[$i]['PT']='';
		             }
					
					}
					else if(!empty($leave_result))
					{
							for($i=0;$i<=8;$i++)
							{
								 $leave_days = array(1=>'1',2=>'2',3=>'3',4=>'4',5=>'5',6=>'6',7=>'7',8=>'8');
						
												 $leave_period = $leave_result[$i]->periods;
												 
											 if(in_array($leave_period,$leave_days,TRUE))
											{
												
											echo 'in'.$leave_period;
											$result[$leave_period]['PS'] ='';
											$result[$leave_period]['PT'] ='';
										    }
										 
							}	
					}
					else
					{
					for($i=0;$i<=7;$i++)	
		             {
					$result[]='';
					 }				
						
					}
					        
		}
		 	
		
		
		sort($result);
        return $result;
		
	}
	function getweektimetable_data_tuesday($school_id,$classid,$sectionid,$this_week_second,$tablename)
	{
		
		 $result = $this->db->get_where($tablename,array('school_id'=>$school_id,'class_id'=>$classid,'section'=>$sectionid,'timetable_date'=>$this_week_second))->result();
		
			$time_table_arr = [];
			
		if(!empty($result))
		{
				$leave_result = $this->db->get_where('schoolnew_school_assign_holidays',array('school_id'=>$school_id,'class_id'=>$classid,'section'=>$sectionid,'leavedate'=>$this_week_second))->result();
					
				foreach($result as $time_index => $period_result)
				{
					 if(!empty($leave_result))
					   { 
							foreach($leave_result as $leave){
								// echo $leave->periods;
								if($leave->periods == $period_result->status)
								{
									$result[$time_index]->PS = '';
									$result[$time_index]->PT ='';
								}else
								{
								  	
								}	
							}
					    }
						$fullday_leave = $this->db->get_where('schoolnew_school_assign_holidays',array('school_id'=>$school_id,'class_id'=>$classid,'section'=>$sectionid,'leavedate'=>$this_week_second,'leavestatus'=>'FD'))->result();
					if(!empty($fullday_leave))	
					{
						for($i=0;$i<=7;$i++)	
		             {
							 $result[$i]->PS = '';
							 $result[$i]->PT ='';
		             }
					}
					$fullschool_leave = $this->db->get_where('schoolnew_school_assign_holidays',array('school_id'=>$school_id,'leavedate'=>$this_week_second,'leavestatus'=>'FS'))->result();
					if(!empty($fullschool_leave))	
					{
						for($i=0;$i<=7;$i++)	
		             {
							 $result[$i]->PS = '';
							 $result[$i]->PT ='';
		             }
					}
						
				}
		}
		else
		{
			
			$fullday_leave = $this->db->get_where('schoolnew_school_assign_holidays',array('school_id'=>$school_id,'class_id'=>$classid,'section'=>$sectionid,'leavedate'=>$this_week_second,'leavestatus'=>'FD'))->result();
			$fullschool_leave = $this->db->get_where('schoolnew_school_assign_holidays',array('school_id'=>$school_id,'leavedate'=>$this_week_second,'leavestatus'=>'FS'))->result();
			$leave_result=$this->db->get_where('schoolnew_school_assign_holidays',array('school_id'=>$school_id,'class_id'=>$classid,'section'=>$sectionid,'leavedate'=>$this_week_second))->result();
			//print_r($leave_result);
		    if(!empty($fullday_leave))	
					{
						
						for($i=0;$i<=7;$i++)	
		             {
							 $result[$i]['PS'] = '';
							 $result[$i]['PT']='';
		             }
					
					}
					else if(!empty($fullschool_leave))	
					{
						
						for($i=0;$i<=7;$i++)	
		             {
							 $result[$i]['PS'] = '';
							 $result[$i]['PT']='';
		             }
					
					}
					else if(!empty($leave_result))
					{
							for($i=0;$i<=8;$i++)
							{
								 $leave_days = array(1=>'1',2=>'2',3=>'3',4=>'4',5=>'5',6=>'6',7=>'7',8=>'8');
						
												 $leave_period = $leave_result[$i]->periods;
												 
											 if(in_array($leave_period,$leave_days,TRUE))
											{
												
											echo 'in'.$leave_period;
											$result[$leave_period]['PS'] ='';
											$result[$leave_period]['PT'] ='';
										    }
										 
							}	
					}
					else
					{
					for($i=0;$i<=7;$i++)	
		             {
					$result[]='';
					 }				
						
					}
					        
		}
		sort($result);
        return $result;
		
	}
	function getweektimetable_data_wednesday($school_id,$classid,$sectionid,$this_week_third,$tablename)
	{
		
        	
		
		$result = $this->db->get_where($tablename,array('school_id'=>$school_id,'class_id'=>$classid,'section'=>$sectionid,'timetable_date'=>$this_week_third))->result();
		
		 
			$time_table_arr = [];
			
		if(!empty($result))
		{
				$leave_result = $this->db->get_where('schoolnew_school_assign_holidays',array('school_id'=>$school_id,'class_id'=>$classid,'section'=>$sectionid,'leavedate'=>$this_week_third))->result();
					
				foreach($result as $time_index => $period_result)
				{
					 if(!empty($leave_result))
					   { 
							foreach($leave_result as $leave){
								// echo $leave->periods;
								if($leave->periods == $period_result->status)
								{
									$result[$time_index]->PS = '';
									$result[$time_index]->PT ='';
								}else
								{
								  	
								}	
							}
					    }
						$fullday_leave = $this->db->get_where('schoolnew_school_assign_holidays',array('school_id'=>$school_id,'class_id'=>$classid,'section'=>$sectionid,'leavedate'=>$this_week_third,'leavestatus'=>'FD'))->result();
					if(!empty($fullday_leave))	
					{
						for($i=0;$i<=7;$i++)	
		             {
							 $result[$i]->PS = '';
							 $result[$i]->PT ='';
		             }
					}
					$fullschool_leave = $this->db->get_where('schoolnew_school_assign_holidays',array('school_id'=>$school_id,'leavedate'=>$this_week_third,'leavestatus'=>'FS'))->result();
					if(!empty($fullschool_leave))	
					{
						for($i=0;$i<=7;$i++)	
		             {
							 $result[$i]->PS = '';
							 $result[$i]->PT ='';
		             }
					}
						
				}
		}
		// else
		// {
		// $result[]='';	
		// }
		else
		{
			
			$fullday_leave = $this->db->get_where('schoolnew_school_assign_holidays',array('school_id'=>$school_id,'class_id'=>$classid,'section'=>$sectionid,'leavedate'=>$this_week_third,'leavestatus'=>'FD'))->result();
			$fullschool_leave = $this->db->get_where('schoolnew_school_assign_holidays',array('school_id'=>$school_id,'leavedate'=>$this_week_third,'leavestatus'=>'FS'))->result();
			$leave_result=$this->db->get_where('schoolnew_school_assign_holidays',array('school_id'=>$school_id,'class_id'=>$classid,'section'=>$sectionid,'leavedate'=>$this_week_third))->result();
			//print_r($leave_result);
		    if(!empty($fullday_leave))	
					{
						
						for($i=0;$i<=7;$i++)	
		             {
							 $result[$i]['PS'] = '';
							 $result[$i]['PT']='';
		             }
					
					}
					else if(!empty($fullschool_leave))	
					{
						
						for($i=0;$i<=7;$i++)	
		             {
							 $result[$i]['PS'] = '';
							 $result[$i]['PT']='';
		             }
					
					}
					else if(!empty($leave_result))
					{
							for($i=0;$i<=8;$i++)
							{
								 $leave_days = array(1=>'1',2=>'2',3=>'3',4=>'4',5=>'5',6=>'6',7=>'7',8=>'8');
						
												 $leave_period = $leave_result[$i]->periods;
												 
											 if(in_array($leave_period,$leave_days,TRUE))
											{
												
											echo 'in'.$leave_period;
											$result[$leave_period]['PS'] ='';
											$result[$leave_period]['PT'] ='';
										    }
										 
							}	
					}
					else
					{
					for($i=0;$i<=7;$i++)	
		             {
					$result[]='';
					 }				
						
					}
					        
		}	
		sort($result);
        return $result;
		
		
	}
	function getweektimetable_data_thursday($school_id,$classid,$sectionid,$this_week_fourth,$tablename)
	{
		
       
		$result = $this->db->get_where($tablename,array('school_id'=>$school_id,'class_id'=>$classid,'section'=>$sectionid,'timetable_date'=>$this_week_fourth))->result();
		
			$time_table_arr = [];
			
		if(!empty($result))
		{
				$leave_result = $this->db->get_where('schoolnew_school_assign_holidays',array('school_id'=>$school_id,'class_id'=>$classid,'section'=>$sectionid,'leavedate'=>$this_week_fourth))->result();
					
				foreach($result as $time_index => $period_result)
				{
					 if(!empty($leave_result))
					   { 
							foreach($leave_result as $leave){
								// echo $leave->periods;
								if($leave->periods == $period_result->status)
								{
									$result[$time_index]->PS = '';
									$result[$time_index]->PT ='';
								}else
								{
								  	
								}	
							}
					    }
						$fullday_leave = $this->db->get_where('schoolnew_school_assign_holidays',array('school_id'=>$school_id,'class_id'=>$classid,'section'=>$sectionid,'leavedate'=>$this_week_fourth,'leavestatus'=>'FD'))->result();
					if(!empty($fullday_leave))	
					{
						for($i=0;$i<=7;$i++)	
		             {
							 $result[$i]->PS = '';
							 $result[$i]->PT ='';
		             }
					}
					$fullschool_leave = $this->db->get_where('schoolnew_school_assign_holidays',array('school_id'=>$school_id,'leavedate'=>$this_week_fourth,'leavestatus'=>'FS'))->result();
					if(!empty($fullschool_leave))	
					{
						for($i=0;$i<=7;$i++)	
		             {
							 $result[$i]->PS = '';
							 $result[$i]->PT ='';
		             }
					}
						
				}
		}
		else
		{
			
			$fullday_leave = $this->db->get_where('schoolnew_school_assign_holidays',array('school_id'=>$school_id,'class_id'=>$classid,'section'=>$sectionid,'leavedate'=>$this_week_fourth,'leavestatus'=>'FD'))->result();
			$fullschool_leave = $this->db->get_where('schoolnew_school_assign_holidays',array('school_id'=>$school_id,'leavedate'=>$this_week_fourth,'leavestatus'=>'FS'))->result();
			$leave_result=$this->db->get_where('schoolnew_school_assign_holidays',array('school_id'=>$school_id,'class_id'=>$classid,'section'=>$sectionid,'leavedate'=>$this_week_fourth))->result();
			//print_r($leave_result);
		    if(!empty($fullday_leave))	
					{
						
						for($i=0;$i<=7;$i++)	
		             {
							 $result[$i]['PS'] = '';
							 $result[$i]['PT']='';
		             }
					
					}
					else if(!empty($fullschool_leave))	
					{
						
						for($i=0;$i<=7;$i++)	
		             {
							 $result[$i]['PS'] = '';
							 $result[$i]['PT']='';
		             }
					
					}
					else if(!empty($leave_result))
					{
							for($i=0;$i<=8;$i++)
							{
								 $leave_days = array(1=>'1',2=>'2',3=>'3',4=>'4',5=>'5',6=>'6',7=>'7',8=>'8');
						
												 $leave_period = $leave_result[$i]->periods;
												 
											 if(in_array($leave_period,$leave_days,TRUE))
											{
												
											echo 'in'.$leave_period;
											$result[$leave_period]['PS'] ='';
											$result[$leave_period]['PT'] ='';
										    }
										 
							}	
					}
					else
					{
					for($i=0;$i<=7;$i++)	
		             {
					$result[]='';
					 }				
						
					}
					        
		}
		sort($result);
        return $result;
		
	}
	function getweektimetable_data_friday($school_id,$classid,$sectionid,$this_week_fifth,$tablename)
	{
		
        
		 $result = $this->db->get_where($tablename,array('school_id'=>$school_id,'class_id'=>$classid,'section'=>$sectionid,'timetable_date'=>$this_week_fifth))->result();
		
			$time_table_arr = [];
			
		if(!empty($result))
		{
				$leave_result = $this->db->get_where('schoolnew_school_assign_holidays',array('school_id'=>$school_id,'class_id'=>$classid,'section'=>$sectionid,'leavedate'=>$this_week_fifth))->result();
					
				foreach($result as $time_index => $period_result)
				{
					 if(!empty($leave_result))
					   { 
							foreach($leave_result as $leave){
								// echo $leave->periods;
								if($leave->periods == $period_result->status)
								{
									$result[$time_index]->PS = '';
									$result[$time_index]->PT ='';
								}else
								{
								  	
								}	
							}
					    }
						$fullday_leave = $this->db->get_where('schoolnew_school_assign_holidays',array('school_id'=>$school_id,'class_id'=>$classid,'section'=>$sectionid,'leavedate'=>$this_week_fifth,'leavestatus'=>'FD'))->result();
					if(!empty($fullday_leave))	
					{
						for($i=0;$i<=7;$i++)	
		             {
							 $result[$i]->PS = '';
							 $result[$i]->PT ='';
		             }
					}
					$fullschool_leave = $this->db->get_where('schoolnew_school_assign_holidays',array('school_id'=>$school_id,'leavedate'=>$this_week_fifth,'leavestatus'=>'FS'))->result();
					if(!empty($fullschool_leave))	
					{
						for($i=0;$i<=7;$i++)	
		             {
							 $result[$i]->PS = '';
							 $result[$i]->PT ='';
		             }
					}
						
				}
		}
		else
		{
			
			$fullday_leave = $this->db->get_where('schoolnew_school_assign_holidays',array('school_id'=>$school_id,'class_id'=>$classid,'section'=>$sectionid,'leavedate'=>$this_week_fifth,'leavestatus'=>'FD'))->result();
			$fullschool_leave = $this->db->get_where('schoolnew_school_assign_holidays',array('school_id'=>$school_id,'leavedate'=>$this_week_fifth,'leavestatus'=>'FS'))->result();
			$leave_result=$this->db->get_where('schoolnew_school_assign_holidays',array('school_id'=>$school_id,'class_id'=>$classid,'section'=>$sectionid,'leavedate'=>$this_week_fifth))->result();
			//print_r($leave_result);
		    if(!empty($fullday_leave))	
					{
						
						for($i=0;$i<=7;$i++)	
		             {
							 $result[$i]['PS'] = '';
							 $result[$i]['PT']='';
		             }
					
					}
					else if(!empty($fullschool_leave))	
					{
						
						for($i=0;$i<=7;$i++)	
		             {
							 $result[$i]['PS'] = '';
							 $result[$i]['PT']='';
		             }
					
					}
					else if(!empty($leave_result))
					{
							for($i=0;$i<=8;$i++)
							{
								 $leave_days = array(1=>'1',2=>'2',3=>'3',4=>'4',5=>'5',6=>'6',7=>'7',8=>'8');
						
												 $leave_period = $leave_result[$i]->periods;
												 
											 if(in_array($leave_period,$leave_days,TRUE))
											{
												
											echo 'in'.$leave_period;
											$result[$leave_period]['PS'] ='';
											$result[$leave_period]['PT'] ='';
										    }
										 
							}	
					}
					else
					{
					for($i=0;$i<=7;$i++)	
		             {
					$result[]='';
					 }				
						
					}
					        
		}	
		sort($result);
        return $result;
		
	}
	function getweektimetable_data_saturday($school_id,$classid,$sectionid,$this_week_sixth,$tablename)
	{
		
        
		$result = $this->db->get_where($tablename,array('school_id'=>$school_id,'class_id'=>$classid,'section'=>$sectionid,'timetable_date'=>$this_week_sixth))->result();
		
			$time_table_arr = [];
			
		if(!empty($result))
		{
				$leave_result = $this->db->get_where('schoolnew_school_assign_holidays',array('school_id'=>$school_id,'class_id'=>$classid,'section'=>$sectionid,'leavedate'=>$this_week_sixth))->result();
					
				foreach($result as $time_index => $period_result)
				{
					 if(!empty($leave_result))
					   { 
							foreach($leave_result as $leave){
								// echo $leave->periods;
								if($leave->periods == $period_result->status)
								{
									$result[$time_index]->PS = '';
									$result[$time_index]->PT ='';
								}else
								{
								  	
								}	
							}
					    }
						$fullday_leave = $this->db->get_where('schoolnew_school_assign_holidays',array('school_id'=>$school_id,'class_id'=>$classid,'section'=>$sectionid,'leavedate'=>$this_week_sixth,'leavestatus'=>'FD'))->result();
					if(!empty($fullday_leave))	
					{
						for($i=0;$i<=7;$i++)	
		             {
							 $result[$i]->PS = '';
							 $result[$i]->PT ='';
		             }
					}
					$fullschool_leave = $this->db->get_where('schoolnew_school_assign_holidays',array('school_id'=>$school_id,'leavedate'=>$this_week_sixth,'leavestatus'=>'FS'))->result();
					if(!empty($fullschool_leave))	
					{
						for($i=0;$i<=7;$i++)	
		             {
							 $result[$i]->PS = '';
							 $result[$i]->PT ='';
		             }
					}
						
				}
		}
		else
		{
			
			$fullday_leave = $this->db->get_where('schoolnew_school_assign_holidays',array('school_id'=>$school_id,'class_id'=>$classid,'section'=>$sectionid,'leavedate'=>$this_week_sixth,'leavestatus'=>'FD'))->result();
			$fullschool_leave = $this->db->get_where('schoolnew_school_assign_holidays',array('school_id'=>$school_id,'leavedate'=>$this_week_sixth,'leavestatus'=>'FS'))->result();
			$leave_result=$this->db->get_where('schoolnew_school_assign_holidays',array('school_id'=>$school_id,'class_id'=>$classid,'section'=>$sectionid,'leavedate'=>$this_week_sixth))->result();
			//print_r($leave_result);
		    if(!empty($fullday_leave))	
					{
						
						for($i=0;$i<=7;$i++)	
		             {
							 $result[$i]['PS'] = '';
							 $result[$i]['PT']='';
		             }
					
					}
					else if(!empty($fullschool_leave))	
					{
						
						for($i=0;$i<=7;$i++)	
		             {
							 $result[$i]['PS'] = '';
							 $result[$i]['PT']='';
		             }
					
					}
					else if(!empty($leave_result))
					{
							for($i=0;$i<=8;$i++)
							{
								 $leave_days = array(1=>'1',2=>'2',3=>'3',4=>'4',5=>'5',6=>'6',7=>'7',8=>'8');
						
												 $leave_period = $leave_result[$i]->periods;
												 
											 if(in_array($leave_period,$leave_days,TRUE))
											{
												
											echo 'in'.$leave_period;
											$result[$leave_period]['PS'] ='';
											$result[$leave_period]['PT'] ='';
										    }
										 
							}	
					}
					else
					{
					for($i=0;$i<=7;$i++)	
		             {
					$result[]='';
					 }				
						
					}
					        
		}		
		sort($result);
        return $result;
		
	}
	function getweektimetable_data_sunday($school_id,$classid,$sectionid,$this_week_ed,$tablename)
	{
		
       
		$result = $this->db->get_where($tablename,array('school_id'=>$school_id,'class_id'=>$classid,'section'=>$sectionid,'timetable_date'=>$this_week_ed))->result();
		
			$time_table_arr = [];
			
		if(!empty($result))
		{
				$leave_result = $this->db->get_where('schoolnew_school_assign_holidays',array('school_id'=>$school_id,'class_id'=>$classid,'section'=>$sectionid,'leavedate'=>$this_week_ed))->result();
					
				foreach($result as $time_index => $period_result)
				{
					 if(!empty($leave_result))
					   { 
							foreach($leave_result as $leave){
								// echo $leave->periods;
								if($leave->periods == $period_result->status)
								{
									$result[$time_index]->PS = '';
									$result[$time_index]->PT ='';
								}else
								{
								  	
								}	
							}
					    }
						$fullday_leave = $this->db->get_where('schoolnew_school_assign_holidays',array('school_id'=>$school_id,'class_id'=>$classid,'section'=>$sectionid,'leavedate'=>$this_week_ed,'leavestatus'=>'FD'))->result();
					if(!empty($fullday_leave))	
					{
						for($i=0;$i<=7;$i++)	
		             {
							 $result[$i]->PS = '';
							 $result[$i]->PT ='';
		             }
					}
					$fullschool_leave = $this->db->get_where('schoolnew_school_assign_holidays',array('school_id'=>$school_id,'leavedate'=>$this_week_ed,'leavestatus'=>'FS'))->result();
					if(!empty($fullschool_leave))	
					{
						for($i=0;$i<=7;$i++)	
		             {
							 $result[$i]->PS = '';
							 $result[$i]->PT ='';
		             }
					}
						
				}
		}
		else
		{
			
			$fullday_leave = $this->db->get_where('schoolnew_school_assign_holidays',array('school_id'=>$school_id,'class_id'=>$classid,'section'=>$sectionid,'leavedate'=>$this_week_ed,'leavestatus'=>'FD'))->result();
			$fullschool_leave = $this->db->get_where('schoolnew_school_assign_holidays',array('school_id'=>$school_id,'leavedate'=>$this_week_ed,'leavestatus'=>'FS'))->result();
			$leave_result=$this->db->get_where('schoolnew_school_assign_holidays',array('school_id'=>$school_id,'class_id'=>$classid,'section'=>$sectionid,'leavedate'=>$this_week_ed))->result();
		    if(!empty($fullday_leave))	
					{
						
						for($i=0;$i<=7;$i++)	
		             {
							 $result[$i]['PS'] = '';
							 $result[$i]['PT']='';
		             }
					
					}
					else if(!empty($fullschool_leave))	
					{
						
						for($i=0;$i<=7;$i++)	
		             {
							 $result[$i]['PS'] = '';
							 $result[$i]['PT']='';
		             }
					
					}
					else if(!empty($leave_result))
					{
							for($i=0;$i<=8;$i++)
							{
								 $leave_days = array(1=>'1',2=>'2',3=>'3',4=>'4',5=>'5',6=>'6',7=>'7',8=>'8');
						
												 $leave_period = $leave_result[$i]->periods;
												 
											 if(in_array($leave_period,$leave_days,TRUE))
											{
												
											echo 'in'.$leave_period;
											$result[$leave_period]['PS'] ='';
											$result[$leave_period]['PT'] ='';
										    }
										 
							}	
					}
					else
					{
					for($i=0;$i<=7;$i++)	
		             {
					$result[]='';
					 }				
						
					}
					        
		}		
		sort($result);
        return $result;
		
	}
	
	/************************************/
	    /* End of week Time Table get data */
	/************************************/
	/************************************/
	    /* Last week Time Table Data Get */
	/************************************/
	function getpreviousweek_data_monday($school_id,$classid,$sectionid,$previous_week_fst)
	{
		 
		 $result = $this->db->get_where('schoolnew_timetable_weekly_classwise',array('school_id'=>$school_id,'class_id'=>$classid,'section'=>$sectionid,'timetable_date'=>$previous_week_fst))->result();
		 
			$time_table_arr = [];
			
		if(!empty($result))
		{
				$leave_result = $this->db->get_where('schoolnew_school_assign_holidays',array('school_id'=>$school_id,'class_id'=>$classid,'section'=>$sectionid,'leavedate'=>$previous_week_fst))->result();
					
				foreach($result as $time_index => $period_result)
				{
					 if(!empty($leave_result))
					   { 
							foreach($leave_result as $leave){
								// echo $leave->periods;
								if($leave->periods == $period_result->status)
								{
									$result[$time_index]->PS = '';
									$result[$time_index]->PT ='';
								}else
								{
									
								}	
							}
					    }
				}
		}
			// else
		// {
			
		    // $leave_result = $this->db->get_where('schoolnew_school_assign_holidays',array('school_id'=>$school_id,'class_id'=>$classid,'section'=>$sectionid,'leavedate'=>$this_week_fst))->result();
				 // // print_r($leave_result);
				 // $result = [];
					  
							// $j = 1;
							// for($i=0;$i<8;$i++)
							// {
								// if(!empty($leave_result)){
									// if(array_key_exists($i,$leave_result))
									// {
										// if($leave_result[$i]->periods == $j)
										// {
											// $result[$i]['PS'] ='';
											// $result[$i]['PT'] ='';
										// }
										
									// }	
								// }else
								// {
									// $result[$i]['PS'] =1;
									// $result[$i]['PT'] =1;	
								// }
								// $j++;
							// }
						
				
				  
		// }
		sort($result);
		// print_r($result);die;
        return $result;
		
	}
	function getpreviousweek_data_tuesday($school_id,$classid,$sectionid,$previous_week_second)
	{
		 
		 $result = $this->db->get_where('schoolnew_timetable_weekly_classwise',array('school_id'=>$school_id,'class_id'=>$classid,'section'=>$sectionid,'timetable_date'=>$previous_week_second))->result();
		 
			$time_table_arr = [];
			
		if(!empty($result))
		{
				$leave_result = $this->db->get_where('schoolnew_school_assign_holidays',array('school_id'=>$school_id,'class_id'=>$classid,'section'=>$sectionid,'leavedate'=>$previous_week_second))->result();
					
				foreach($result as $time_index => $period_result)
				{
					 if(!empty($leave_result))
					   { 
							foreach($leave_result as $leave){
								// echo $leave->periods;
								if($leave->periods == $period_result->status)
								{
									$result[$time_index]->PS = '';
									$result[$time_index]->PT ='';
								}else
								{
									
								}	
							}
					    }
				}
		}
			// else
		// {
			
		    // $leave_result = $this->db->get_where('schoolnew_school_assign_holidays',array('school_id'=>$school_id,'class_id'=>$classid,'section'=>$sectionid,'leavedate'=>$this_week_fst))->result();
				 // // print_r($leave_result);
				 // $result = [];
					  
							// $j = 1;
							// for($i=0;$i<8;$i++)
							// {
								// if(!empty($leave_result)){
									// if(array_key_exists($i,$leave_result))
									// {
										// if($leave_result[$i]->periods == $j)
										// {
											// $result[$i]['PS'] ='';
											// $result[$i]['PT'] ='';
										// }
										
									// }	
								// }else
								// {
									// $result[$i]['PS'] =1;
									// $result[$i]['PT'] =1;	
								// }
								// $j++;
							// }
						
				
				  
		// }
		sort($result);
		// print_r($result);die;
        return $result;
		
	}
	function getpreviousweek_data_wednesday($school_id,$classid,$sectionid,$previous_week_third)
	{
		 
		 $result = $this->db->get_where('schoolnew_timetable_weekly_classwise',array('school_id'=>$school_id,'class_id'=>$classid,'section'=>$sectionid,'timetable_date'=>$previous_week_third))->result();
		 
			$time_table_arr = [];
			
		if(!empty($result))
		{
				$leave_result = $this->db->get_where('schoolnew_school_assign_holidays',array('school_id'=>$school_id,'class_id'=>$classid,'section'=>$sectionid,'leavedate'=>$previous_week_third))->result();
					
				foreach($result as $time_index => $period_result)
				{
					 if(!empty($leave_result))
					   { 
							foreach($leave_result as $leave){
								// echo $leave->periods;
								if($leave->periods == $period_result->status)
								{
									$result[$time_index]->PS = '';
									$result[$time_index]->PT ='';
								}else
								{
									
								}	
							}
					    }
				}
		}
			// else
		// {
			
		    // $leave_result = $this->db->get_where('schoolnew_school_assign_holidays',array('school_id'=>$school_id,'class_id'=>$classid,'section'=>$sectionid,'leavedate'=>$this_week_fst))->result();
				 // // print_r($leave_result);
				 // $result = [];
					  
							// $j = 1;
							// for($i=0;$i<8;$i++)
							// {
								// if(!empty($leave_result)){
									// if(array_key_exists($i,$leave_result))
									// {
										// if($leave_result[$i]->periods == $j)
										// {
											// $result[$i]['PS'] ='';
											// $result[$i]['PT'] ='';
										// }
										
									// }	
								// }else
								// {
									// $result[$i]['PS'] =1;
									// $result[$i]['PT'] =1;	
								// }
								// $j++;
							// }
						
				
				  
		// }
		sort($result);
		// print_r($result);die;
        return $result;
		
	}
	function getpreviousweek_data_thursday($school_id,$classid,$sectionid,$previous_week_fourth)
	{
		 
		 $result = $this->db->get_where('schoolnew_timetable_weekly_classwise',array('school_id'=>$school_id,'class_id'=>$classid,'section'=>$sectionid,'timetable_date'=>$previous_week_fourth))->result();
		 
			$time_table_arr = [];
			
		if(!empty($result))
		{
				$leave_result = $this->db->get_where('schoolnew_school_assign_holidays',array('school_id'=>$school_id,'class_id'=>$classid,'section'=>$sectionid,'leavedate'=>$previous_week_fourth))->result();
					
				foreach($result as $time_index => $period_result)
				{
					 if(!empty($leave_result))
					   { 
							foreach($leave_result as $leave){
								// echo $leave->periods;
								if($leave->periods == $period_result->status)
								{
									$result[$time_index]->PS = '';
									$result[$time_index]->PT ='';
								}else
								{
									
								}	
							}
					    }
				}
		}
			// else
		// {
			
		    // $leave_result = $this->db->get_where('schoolnew_school_assign_holidays',array('school_id'=>$school_id,'class_id'=>$classid,'section'=>$sectionid,'leavedate'=>$this_week_fst))->result();
				 // // print_r($leave_result);
				 // $result = [];
					  
							// $j = 1;
							// for($i=0;$i<8;$i++)
							// {
								// if(!empty($leave_result)){
									// if(array_key_exists($i,$leave_result))
									// {
										// if($leave_result[$i]->periods == $j)
										// {
											// $result[$i]['PS'] ='';
											// $result[$i]['PT'] ='';
										// }
										
									// }	
								// }else
								// {
									// $result[$i]['PS'] =1;
									// $result[$i]['PT'] =1;	
								// }
								// $j++;
							// }
						
				
				  
		// }
		sort($result);
		// print_r($result);die;
        return $result;
		
	}
	function getpreviousweek_data_friday($school_id,$classid,$sectionid,$previous_week_fifth)
	{
		 
		 $result = $this->db->get_where('schoolnew_timetable_weekly_classwise',array('school_id'=>$school_id,'class_id'=>$classid,'section'=>$sectionid,'timetable_date'=>$previous_week_fifth))->result();
		 
			$time_table_arr = [];
			
		if(!empty($result))
		{
				$leave_result = $this->db->get_where('schoolnew_school_assign_holidays',array('school_id'=>$school_id,'class_id'=>$classid,'section'=>$sectionid,'leavedate'=>$previous_week_fifth))->result();
					
				foreach($result as $time_index => $period_result)
				{
					 if(!empty($leave_result))
					   { 
							foreach($leave_result as $leave){
								// echo $leave->periods;
								if($leave->periods == $period_result->status)
								{
									$result[$time_index]->PS = '';
									$result[$time_index]->PT ='';
								}else
								{
									
								}	
							}
					    }
				}
		}
			// else
		// {
			
		    // $leave_result = $this->db->get_where('schoolnew_school_assign_holidays',array('school_id'=>$school_id,'class_id'=>$classid,'section'=>$sectionid,'leavedate'=>$this_week_fst))->result();
				 // // print_r($leave_result);
				 // $result = [];
					  
							// $j = 1;
							// for($i=0;$i<8;$i++)
							// {
								// if(!empty($leave_result)){
									// if(array_key_exists($i,$leave_result))
									// {
										// if($leave_result[$i]->periods == $j)
										// {
											// $result[$i]['PS'] ='';
											// $result[$i]['PT'] ='';
										// }
										
									// }	
								// }else
								// {
									// $result[$i]['PS'] =1;
									// $result[$i]['PT'] =1;	
								// }
								// $j++;
							// }
						
				
				  
		// }
		sort($result);
		// print_r($result);die;
        return $result;
		
	}
	function getpreviousweek_data_saturday($school_id,$classid,$sectionid,$previous_week_sixth)
	{
		 
		 $result = $this->db->get_where('schoolnew_timetable_weekly_classwise',array('school_id'=>$school_id,'class_id'=>$classid,'section'=>$sectionid,'timetable_date'=>$previous_week_sixth))->result();
		 
			$time_table_arr = [];
			
		if(!empty($result))
		{
				$leave_result = $this->db->get_where('schoolnew_school_assign_holidays',array('school_id'=>$school_id,'class_id'=>$classid,'section'=>$sectionid,'leavedate'=>$previous_week_sixth))->result();
					
				foreach($result as $time_index => $period_result)
				{
					 if(!empty($leave_result))
					   { 
							foreach($leave_result as $leave){
								// echo $leave->periods;
								if($leave->periods == $period_result->status)
								{
									$result[$time_index]->PS = '';
									$result[$time_index]->PT ='';
								}else
								{
									
								}	
							}
					    }
				}
		}
			// else
		// {
			
		    // $leave_result = $this->db->get_where('schoolnew_school_assign_holidays',array('school_id'=>$school_id,'class_id'=>$classid,'section'=>$sectionid,'leavedate'=>$this_week_fst))->result();
				 // // print_r($leave_result);
				 // $result = [];
					  
							// $j = 1;
							// for($i=0;$i<8;$i++)
							// {
								// if(!empty($leave_result)){
									// if(array_key_exists($i,$leave_result))
									// {
										// if($leave_result[$i]->periods == $j)
										// {
											// $result[$i]['PS'] ='';
											// $result[$i]['PT'] ='';
										// }
										
									// }	
								// }else
								// {
									// $result[$i]['PS'] =1;
									// $result[$i]['PT'] =1;	
								// }
								// $j++;
							// }
						
				
				  
		// }
		sort($result);
		// print_r($result);die;
        return $result;
		
	}
	function getpreviousweek_data_sunday($school_id,$classid,$sectionid,$previous_week_ed)
	{
		 
		 $result = $this->db->get_where('schoolnew_timetable_weekly_classwise',array('school_id'=>$school_id,'class_id'=>$classid,'section'=>$sectionid,'timetable_date'=>$previous_week_ed))->result();
		 
			$time_table_arr = [];
			
		if(!empty($result))
		{
				$leave_result = $this->db->get_where('schoolnew_school_assign_holidays',array('school_id'=>$school_id,'class_id'=>$classid,'section'=>$sectionid,'leavedate'=>$previous_week_ed))->result();
					
				foreach($result as $time_index => $period_result)
				{
					 if(!empty($leave_result))
					   { 
							foreach($leave_result as $leave){
								// echo $leave->periods;
								if($leave->periods == $period_result->status)
								{
									$result[$time_index]->PS = '';
									$result[$time_index]->PT ='';
								}else
								{
									
								}	
							}
					    }
				}
		}
			// else
		// {
			
		    // $leave_result = $this->db->get_where('schoolnew_school_assign_holidays',array('school_id'=>$school_id,'class_id'=>$classid,'section'=>$sectionid,'leavedate'=>$this_week_fst))->result();
				 // // print_r($leave_result);
				 // $result = [];
					  
							// $j = 1;
							// for($i=0;$i<8;$i++)
							// {
								// if(!empty($leave_result)){
									// if(array_key_exists($i,$leave_result))
									// {
										// if($leave_result[$i]->periods == $j)
										// {
											// $result[$i]['PS'] ='';
											// $result[$i]['PT'] ='';
										// }
										
									// }	
								// }else
								// {
									// $result[$i]['PS'] =1;
									// $result[$i]['PT'] =1;	
								// }
								// $j++;
							// }
						
				
				  
		// }
		sort($result);
		// print_r($result);die;
        return $result;
		
	}
	
	/************************************/
	    /* End of week Time Table get data */
	/************************************/
	function gettimetable_count($school_id,$classid,$sectionid,$previous_week_fst,$previous_week_ed)
	{
		$this->db->select('count(subjects) as subcount,subjects');
        $this->db->from('schoolnew_timetable_weekly_classwise');
		$this->db->join('teacher_subjects','schoolnew_timetable_weekly_classwise.PS=teacher_subjects.id','left');
        $this->db->where('school_id',$school_id);
		$this->db->where('class_id',$classid);
		$this->db->where('section',$sectionid);
		$this->db->where('timetable_date >=',$previous_week_fst);
		$this->db->where('timetable_date <=',$previous_week_ed);
		//$this->db->where('schoolnew_timetable_term_classwise.PS !=','');
        $this->db->group_by('subjects');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
	}
	function gettimetable_count_teacher($school_id,$termid,$classid,$sectionid,$previous_week_fst,$previous_week_ed)
	{
		 $SQL="SELECT count(PT) as teacher_count, udise_staffreg.teacher_name FROM schoolnew_timetable_weekly_classwise
JOIN udise_staffreg ON schoolnew_timetable_weekly_classwise.school_id=udise_staffreg.school_key_id and schoolnew_timetable_weekly_classwise.PT=udise_staffreg.teacher_code 
WHERE schoolnew_timetable_weekly_classwise.school_id =".$school_id." AND timetable_date >= '".$previous_week_fst."' AND timetable_date <= '".$previous_week_ed."' AND schoolnew_timetable_weekly_classwise.PT != '' AND schoolnew_timetable_weekly_classwise.leavestatus IS NULL GROUP BY teacher_name 
UNION ALL
SELECT count(PT) as teacher_count, teacher_volunteers_subjects.teacher_name FROM schoolnew_timetable_weekly_classwise
JOIN teacher_volunteers_subjects ON schoolnew_timetable_weekly_classwise.school_id=teacher_volunteers_subjects.school_key_id and schoolnew_timetable_weekly_classwise.PT=teacher_volunteers_subjects.teacher_id
WHERE schoolnew_timetable_weekly_classwise.school_id =".$school_id." AND timetable_date >= '".$previous_week_fst."' AND timetable_date <= '".$previous_week_ed."' AND schoolnew_timetable_weekly_classwise.PT != '' AND schoolnew_timetable_weekly_classwise.leavestatus IS NULL 
GROUP BY teacher_name;";
       $query = $this->db->query($SQL);
       return $query->result();
		
	}
	function getweektimetable_count($school_id,$classid,$sectionid,$this_week_fst,$this_week_ed)
	{

		$this->db->select('count(subjects) as subcount,subjects');
        $this->db->from('schoolnew_timetable_weekly_classwise');
		$this->db->join('teacher_subjects','schoolnew_timetable_weekly_classwise.PS=teacher_subjects.id','left');
		// $this->db->join('schoolnew_lesson_plan','schoolnew_timetable_weekly_classwise.PS=schoolnew_lesson_plan.subject_id','left');
        $this->db->where('school_id',$school_id);
		//$this->db->where('term_id',$termid);
		$this->db->where('class_id',$classid);
		$this->db->where('section',$sectionid);
		$this->db->where('timetable_date >=',$this_week_fst);
		$this->db->where('timetable_date <=',$this_week_ed);
		$this->db->where('schoolnew_timetable_weekly_classwise.PS !=',null);
		$this->db->where('schoolnew_timetable_weekly_classwise.PS !=',999);
		$this->db->where('schoolnew_timetable_weekly_classwise.leavestatus',null);
        $this->db->group_by('subjects');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
	}
	
	function getweektimetable_count_teacher($school_id,$this_week_fst,$this_week_ed,$classid,$sectionid)
	{
		
		$previous_week=date("Y-m-d", strtotime("last week sunday"));
		//print_r($previous_week);
		if(!empty($classid))
		{
		 $SQL="select a.teacher_count,b.teacher_count_total,a.teacher_name,a.subjects,a.classes from 
(SELECT count(PT) as teacher_count, udise_staffreg.teacher_name,subjects,concat(schoolnew_timetable_weekly_classwise.class_id,'-',schoolnew_timetable_weekly_classwise.section)as classes FROM schoolnew_timetable_weekly_classwise
 JOIN udise_staffreg ON schoolnew_timetable_weekly_classwise.school_id=udise_staffreg.school_key_id and schoolnew_timetable_weekly_classwise.PT=udise_staffreg.teacher_code 
LEFT JOIN teacher_subjects ON schoolnew_timetable_weekly_classwise.PS=teacher_subjects.id
WHERE schoolnew_timetable_weekly_classwise.school_id = ".$school_id." AND schoolnew_timetable_weekly_classwise.class_id=".$classid." AND schoolnew_timetable_weekly_classwise.section='".$sectionid."' AND  timetable_date >= '".$this_week_fst."' AND timetable_date <= '".$this_week_ed."'   AND schoolnew_timetable_weekly_classwise.PT != '' AND schoolnew_timetable_weekly_classwise.leavestatus IS NULL GROUP BY teacher_name,subjects,classes) a
left join 
(SELECT count(PT) as teacher_count_total, udise_staffreg.teacher_name,subjects,concat(schoolnew_timetable_weekly_classwise.class_id,'-',schoolnew_timetable_weekly_classwise.section)as classes FROM schoolnew_timetable_weekly_classwise JOIN udise_staffreg ON schoolnew_timetable_weekly_classwise.school_id=udise_staffreg.school_key_id and schoolnew_timetable_weekly_classwise.PT=udise_staffreg.teacher_code 
LEFT JOIN teacher_subjects ON schoolnew_timetable_weekly_classwise.PS=teacher_subjects.id WHERE schoolnew_timetable_weekly_classwise.school_id = ".$school_id." AND schoolnew_timetable_weekly_classwise.class_id=".$classid." AND schoolnew_timetable_weekly_classwise.section='".$sectionid."' AND  timetable_date <= '".$previous_week."' AND schoolnew_timetable_weekly_classwise.PT != '' AND schoolnew_timetable_weekly_classwise.leavestatus IS NULL GROUP BY teacher_name,subjects,classes) b on a.teacher_name=b.teacher_name and a.subjects=b.subjects and a.classes=b.classes GROUP BY teacher_name,subjects,classes
";
       $query = $this->db->query($SQL);
       return $query->result();
		}
	}
	function getweektimetable_count_volunteers_teacher($school_id,$this_week_fst,$this_week_ed,$classid,$sectionid)
	{
		$previous_week=date("Y-m-d", strtotime("last week sunday"));
		if(!empty($classid))
		{
		 $SQL="select a.teacher_count,b.teacher_count_total,a.subjects,a.teacher_name
	from (SELECT count(PT) as teacher_count, teacher_volunteers_subjects.teacher_name,subjects FROM schoolnew_timetable_weekly_classwise
JOIN teacher_volunteers_subjects ON schoolnew_timetable_weekly_classwise.school_id=teacher_volunteers_subjects.school_key_id and schoolnew_timetable_weekly_classwise.PT=teacher_volunteers_subjects.teacher_id
LEFT JOIN teacher_subjects ON schoolnew_timetable_weekly_classwise.PS=teacher_subjects.id
WHERE schoolnew_timetable_weekly_classwise.school_id = ".$school_id." AND schoolnew_timetable_weekly_classwise.class_id=".$classid." AND schoolnew_timetable_weekly_classwise.section='".$sectionid."' AND timetable_date >= '".$this_week_fst."' AND timetable_date <= '".$this_week_ed."'  AND schoolnew_timetable_weekly_classwise.PT != '' AND schoolnew_timetable_weekly_classwise.leavestatus IS NULL 
GROUP BY teacher_name,subjects)as a
left join 
(SELECT count(PT) as teacher_count_total, teacher_volunteers_subjects.teacher_name,subjects FROM schoolnew_timetable_weekly_classwise
JOIN teacher_volunteers_subjects ON schoolnew_timetable_weekly_classwise.school_id=teacher_volunteers_subjects.school_key_id and schoolnew_timetable_weekly_classwise.PT=teacher_volunteers_subjects.teacher_id
LEFT JOIN teacher_subjects ON schoolnew_timetable_weekly_classwise.PS=teacher_subjects.id
WHERE schoolnew_timetable_weekly_classwise.school_id = ".$school_id." AND schoolnew_timetable_weekly_classwise.class_id=".$classid." AND schoolnew_timetable_weekly_classwise.section='".$sectionid."' AND timetable_date <= '".$previous_week."'  AND schoolnew_timetable_weekly_classwise.PT != '' AND schoolnew_timetable_weekly_classwise.leavestatus IS NULL 
GROUP BY teacher_name,subjects)as b on 
a.teacher_name=b.teacher_name and a.subjects=b.subjects  GROUP BY teacher_name,subjects
;";
       $query = $this->db->query($SQL);
       return $query->result();
		}
	}
	function getweektimetable_count_teacher_all_class($school_id,$this_week_fst,$this_week_ed)
	{
		
		$previous_week=date("Y-m-d", strtotime("last week sunday"));
		 $SQL="select a.teacher_count,b.teacher_count_total,a.teacher_name,a.subjects,a.classes from 
(SELECT count(PT) as teacher_count, udise_staffreg.teacher_name,subjects,concat(schoolnew_timetable_weekly_classwise.class_id,'-',schoolnew_timetable_weekly_classwise.section)as classes FROM schoolnew_timetable_weekly_classwise
 JOIN udise_staffreg ON schoolnew_timetable_weekly_classwise.school_id=udise_staffreg.school_key_id and schoolnew_timetable_weekly_classwise.PT=udise_staffreg.teacher_code 
LEFT JOIN teacher_subjects ON schoolnew_timetable_weekly_classwise.PS=teacher_subjects.id
WHERE schoolnew_timetable_weekly_classwise.school_id = ".$school_id." AND  timetable_date >= '".$this_week_fst."' AND timetable_date <= '".$this_week_ed."'   AND schoolnew_timetable_weekly_classwise.PT != '' AND schoolnew_timetable_weekly_classwise.leavestatus IS NULL GROUP BY teacher_name,subjects,classes) a
left join 
(SELECT count(PT) as teacher_count_total, udise_staffreg.teacher_name,subjects,concat(schoolnew_timetable_weekly_classwise.class_id,'-',schoolnew_timetable_weekly_classwise.section)as classes FROM schoolnew_timetable_weekly_classwise JOIN udise_staffreg ON schoolnew_timetable_weekly_classwise.school_id=udise_staffreg.school_key_id and schoolnew_timetable_weekly_classwise.PT=udise_staffreg.teacher_code 
LEFT JOIN teacher_subjects ON schoolnew_timetable_weekly_classwise.PS=teacher_subjects.id WHERE schoolnew_timetable_weekly_classwise.school_id = ".$school_id." AND  timetable_date <= '".$previous_week."' AND  schoolnew_timetable_weekly_classwise.PT != '' AND schoolnew_timetable_weekly_classwise.leavestatus IS NULL GROUP BY teacher_name,subjects,classes) b on a.teacher_name=b.teacher_name and a.subjects=b.subjects and a.classes=b.classes GROUP BY teacher_name,subjects,classes
";
       $query = $this->db->query($SQL);
       return $query->result();
		
	}
	function getweektimetable_count_volunteers_teacher_all_class($school_id,$this_week_fst,$this_week_ed)
	{
		$previous_week=date("Y-m-d", strtotime("last week sunday"));
	$SQL="select a.teacher_count,b.teacher_count_total,a.subjects,a.teacher_name,a.classes
	from (SELECT count(PT) as teacher_count,subjects, teacher_volunteers_subjects.teacher_name,concat(schoolnew_timetable_weekly_classwise.class_id,'-',schoolnew_timetable_weekly_classwise.section)as classes FROM schoolnew_timetable_weekly_classwise
JOIN teacher_volunteers_subjects ON schoolnew_timetable_weekly_classwise.school_id=teacher_volunteers_subjects.school_key_id and schoolnew_timetable_weekly_classwise.PT=teacher_volunteers_subjects.teacher_id
LEFT JOIN teacher_subjects ON schoolnew_timetable_weekly_classwise.PS=teacher_subjects.id
WHERE schoolnew_timetable_weekly_classwise.school_id = ".$school_id."  AND  timetable_date >= '".$this_week_fst."' AND timetable_date <= '".$this_week_ed."'   AND schoolnew_timetable_weekly_classwise.PT != '' AND schoolnew_timetable_weekly_classwise.leavestatus IS NULL 
GROUP BY teacher_name,subjects,classes) a
left join
(SELECT count(PT) as teacher_count_total,subjects, teacher_volunteers_subjects.teacher_name,concat(schoolnew_timetable_weekly_classwise.class_id,'-',schoolnew_timetable_weekly_classwise.section)as classes FROM schoolnew_timetable_weekly_classwise
JOIN teacher_volunteers_subjects ON schoolnew_timetable_weekly_classwise.school_id=teacher_volunteers_subjects.school_key_id and schoolnew_timetable_weekly_classwise.PT=teacher_volunteers_subjects.teacher_id
LEFT JOIN teacher_subjects ON schoolnew_timetable_weekly_classwise.PS=teacher_subjects.id
WHERE schoolnew_timetable_weekly_classwise.school_id = ".$school_id."  AND  timetable_date <= '".$previous_week."' AND  schoolnew_timetable_weekly_classwise.PT != '' AND schoolnew_timetable_weekly_classwise.leavestatus IS NULL 
GROUP BY teacher_name,subjects,classes) b on
a.teacher_name=b.teacher_name and a.subjects=b.subjects and a.classes=b.classes GROUP BY teacher_name,subjects,classes
;";
       $query = $this->db->query($SQL);
       return $query->result();	
	}
	function assign_teacher_data($data){
		
     $this->db->insert('teachers_assigned_class',$data); 
     return $this->db->insert_id();
    }
	function assign_teacher_data_update($teacher_code,$data)
	{
		
		$this->db->where('teacher_code',$teacher_code);
		return $this->db->update('teachers_assigned_class', $data); 
		
	}
	function getallclasssections($school_id ){
       

        $this->db->select('schoolnew_section_group.id,schoolnew_section_group.class_id,schoolnew_section_group.section,schoolnew_section_group.group_id,schoolnew_section_group.school_type,schoolnew_section_group.school_medium_id,schoolnew_mediumofinstruction.MEDINSTR_DESC,baseapp_group_code.group_name') 
        ->from('schoolnew_section_group')
        ->join('schoolnew_mediumofinstruction','schoolnew_mediumofinstruction.MEDINSTR_ID=schoolnew_section_group.school_medium_id','left')
        ->join('baseapp_group_code ','baseapp_group_code.id=schoolnew_section_group.group_id','left')
        ->where('schoolnew_section_group.school_key_id',$school_id)
        ->order_by('schoolnew_section_group.class_id', 'ASC');
		//->limit('5');

        $query =  $this->db->get();
		//print_r($this->db->last_query());die;
		return $query->result();
		
    } 
	
	function timetable_configuration($data)
	{
	$this->db->insert('schoolnew_timetable_configuration',$data); 
     return $this->db->insert_id();	
	}
	function timetable_configuration_update($data,$updateid)
	{
	$this->db->where('id',$updateid);
	return $this->db->update('schoolnew_section_group', $data); 	
	}
	function getassignClassDetail($school_id,$this_week_fst,$this_week_ed){
   $sql="select count(a.class_id)as totalclasssection,marked from  schoolnew_section_group a
   left join (select count(*) as marked,school_id from (
   select count(class_id),school_id from schoolnew_timetable_weekly_classwise
   where school_id= ".$school_id." and timetable_date BETWEEN '".$this_week_fst."' AND '".$this_week_ed."' group by class_id,section
   ) d1) as b on a.school_key_id = b.school_id
   where school_key_id= ".$school_id.";";
    
      $query =  $this->db->query($sql);
      return $query->result();
   }
   function getassignClasslist($school_id,$this_week_fst,$this_week_ed)
   {
	    $sql="select
concat(schoolnew_section_group.class_id,'-',schoolnew_section_group.section) as classes,sum(case when schoolnew_timetable_weekly_classwise.PS != '' and (CASE WHEN (schoolnew_section_group.class_id=schoolnew_timetable_weekly_classwise.class_id 
AND schoolnew_section_group.section=schoolnew_timetable_weekly_classwise.section) THEN 1
      ELSE 0 END
)=1 then 1 else  0 end) as assigned,
MAX((CASE WHEN (schoolnew_section_group.class_id=schoolnew_timetable_weekly_classwise.class_id 
AND schoolnew_section_group.section=schoolnew_timetable_weekly_classwise.section) THEN 1
      ELSE 0 END
))as time_table
from schoolnew_timetable_weekly_classwise
JOIN schoolnew_section_group ON schoolnew_section_group.school_key_id=schoolnew_timetable_weekly_classwise.school_id
where  schoolnew_section_group.class_id not in('13','14','15') and timetable_date BETWEEN '".$this_week_fst."'  AND '".$this_week_ed."' and school_id=".$school_id." and PS!=999 group by classes";
	    $query =  $this->db->query($sql);
        return $query->result();
   }
   
   function assign_holidays($saveholidays)
   {
	 if(!empty($saveholidays))
	 {		 
	 $this->db->insert('schoolnew_school_assign_holidays',$saveholidays); 
     return $this->db->insert_id();
	 }	 
	   
   }
   function assign_leave_timetable_allschool($leavedate,$leavestatus)
   {
	    $this->db->set('leavestatus',$leavestatus); 
		//$this->db->where('school_id',$school_id); 
        $this->db->where('timetable_date',$leavedate);
		$this->db->update('schoolnew_timetable_weekly_classwise'); 
		$r = $this->db->affected_rows();
	    return $r;
	   
   }
   function assign_leave_timetable_classwise($school_id,$holidays_date,$leavestatus,$class_id,$section)
   {
	    $this->db->set('leavestatus',$leavestatus); 
		$this->db->where('school_id',$school_id); 
        $this->db->where('timetable_date',$holidays_date);
        $this->db->where('class_id',$class_id);
        $this->db->where('section',$section); 
         		
		$this->db->update('schoolnew_timetable_weekly_classwise'); 
		$r = $this->db->affected_rows();
	    return $r;
   }
    function assign_leave_timetable($school_id,$holidays_date,$leavestatus,$class_id,$section,$assignperiods)
   {
	    $this->db->set('leavestatus',$leavestatus); 
		$this->db->where('school_id',$school_id); 
        $this->db->where('timetable_date',$holidays_date);
        $this->db->where('class_id',$class_id);
        $this->db->where('section',$section); 
        $this->db->where('status',$assignperiods); 		
		$this->db->update('schoolnew_timetable_weekly_classwise'); 
		$r = $this->db->affected_rows();
	    return $r;
   }
   function getleave()
   {
	   //$this->db->select('leavedate,reason');
       //$this->db->from('schoolnew_school_assign_holidays');
	   //$this->db->order_by('leavedate')
       // $query = $this->db->get();
       // $result = $query->result();
       // return $result;  
		 $query = 'SELECT leavedate,reason 
		FROM schoolnew_school_assign_holidays order by leavedate'
	;
      $result = $this->db->query($query)->result();
       return $result;
   }
   function gettimetable_leave_status($today,$school_id)
   {
	 $query = "SELECT count(leavedate)as count 
		FROM schoolnew_school_assign_holidays where school_id=".$school_id." and leavedate='".$today."'"
	;
      $result = $this->db->query($query)->result();
       return $result;   
   }
   function getteachername($teacherid)
   {
	   $this->db->select('teacher_name');
        $this->db->from('udise_staffreg');
        $this->db->where('teacher_code',$teacherid);
        $query = $this->db->get();
        $result = $query->result();
        return $result;  
   }
   function getschoolname($school_id)
   {
	   $this->db->select('school_name');
        $this->db->from('students_school_child_count');
        $this->db->where('school_id',$school_id);
        $query = $this->db->get();
        $result = $query->result();
        return $result;  
   }
   function getcountperiods($teacherid,$this_week_fst,$this_week_ed)
   {
	    $this->db->select('count(PT)as assigned');
		 $this->db->select("CONCAT(class_id,'-',section)as classes");
        $this->db->from('schoolnew_timetable_weekly_classwise');
        $this->db->where('PT',$teacherid);
		$this->db->where('timetable_date >=',$this_week_fst);
		$this->db->where('timetable_date <=',$this_week_ed);
		$this->db->group_by('class_id,section');
		//print_r($this->db->last_query());die;
        $query = $this->db->get();
        $result = $query->result();
        return $result;  
   }
    function getleave_thisweek($school_id,$this_week_fst,$this_week_ed)
   {
	    $this->db->select('*');
        $this->db->from('schoolnew_school_assign_holidays');
        $this->db->where('school_id',$school_id);
		$this->db->where('leavedate >=',$this_week_fst);
		$this->db->where('leavedate <=',$this_week_ed);
		$this->db->group_by('class_id,section,leavedate');
		$this->db->order_by('leavedate,class_id,section');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
   }
   function delete_holidays($deleteid)
   {
	
		$this->db->where('id',$deleteid);
        $this->db->delete('schoolnew_school_assign_holidays');
        return $this->db->insert_id();   
   }
   function holidays_details($school_id,$holidaydate)
   {
	   $this->db->select('leavedate');
        $this->db->from('schoolnew_school_assign_holidays');
        $this->db->where('school_id',$school_id);
		$this->db->where('leavedate',$holidaydate);
		$this->db->where('leavestatus','FS');
        $query = $this->db->get();
        $result = $query->result();
        return $result; 
   }
   	function getweektimetable_data_monday_pdf($school_id,$classid,$sectionid,$this_week_fst)
	{
		
		$sql ="select subjects,teacher_name,schoolnew_timetable_weekly_classwise.status from schoolnew_timetable_weekly_classwise 
		left join teacher_subjects on schoolnew_timetable_weekly_classwise.PS=teacher_subjects.id 
		left join udise_staffreg on schoolnew_timetable_weekly_classwise.PT=udise_staffreg.teacher_code where schoolnew_timetable_weekly_classwise.school_id=".$school_id." and schoolnew_timetable_weekly_classwise.class_id=".$classid." and schoolnew_timetable_weekly_classwise.section='".$sectionid."' and schoolnew_timetable_weekly_classwise.timetable_date='".$this_week_fst."'";
		$query =  $this->db->query($sql);
        $result=$query->result();
		
		if(!empty($result))
		{
			
				$leave_result = $this->db->get_where('schoolnew_school_assign_holidays',array('school_id'=>$school_id,'class_id'=>$classid,'section'=>$sectionid,'leavedate'=>$this_week_fst))->result();
					
				foreach($result as $time_index => $period_result)
				{
					 if(!empty($leave_result))
					   { 
							foreach($leave_result as $leave){
								// echo $leave->periods;
								if($leave->periods == $period_result->status)
								{
									$result[$time_index]->subjects = '';
									$result[$time_index]->teacher_name ='';
								}else
								{
								  	
								}	
							}
					    }
						$fullday_leave = $this->db->get_where('schoolnew_school_assign_holidays',array('school_id'=>$school_id,'class_id'=>$classid,'section'=>$sectionid,'leavedate'=>$this_week_fst,'leavestatus'=>'FD'))->result();
					if(!empty($fullday_leave))	
					{
						for($i=0;$i<=7;$i++)	
		             {
							 $result[$i]->subjects = 'leave';
							 $result[$i]->teacher_name ='leave';
		             }
					}
					$fullschool_leave = $this->db->get_where('schoolnew_school_assign_holidays',array('school_id'=>$school_id,'leavedate'=>$this_week_fst,'leavestatus'=>'FS'))->result();
					if(!empty($fullschool_leave))	
					{
						for($i=0;$i<=7;$i++)	
		             {
							 $result[$i]->subjects = 'leave';
							 $result[$i]->teacher_name ='leave';
		             }
					}
						
				}
		}
		//sort($result);
        return $result;
	}
	   	function getweektimetable_data_tuesday_pdf($school_id,$classid,$sectionid,$this_week_second)
	{
		$sql ="select subjects,teacher_name,schoolnew_timetable_weekly_classwise.status from schoolnew_timetable_weekly_classwise 
		left join teacher_subjects on schoolnew_timetable_weekly_classwise.PS=teacher_subjects.id 
		left join udise_staffreg on schoolnew_timetable_weekly_classwise.PT=udise_staffreg.teacher_code where schoolnew_timetable_weekly_classwise.school_id=".$school_id." and schoolnew_timetable_weekly_classwise.class_id=".$classid." and schoolnew_timetable_weekly_classwise.section='".$sectionid."' and schoolnew_timetable_weekly_classwise.timetable_date='".$this_week_second."'";
		$query =  $this->db->query($sql);
        $result=$query->result();
		
		if(!empty($result))
		{
			
				$leave_result = $this->db->get_where('schoolnew_school_assign_holidays',array('school_id'=>$school_id,'class_id'=>$classid,'section'=>$sectionid,'leavedate'=>$this_week_second))->result();
				//print_r($leave_result);	
				foreach($result as $time_index => $period_result)
				{
					 if(!empty($leave_result))
					   { 
							foreach($leave_result as $leave){
								// echo $leave->periods;
								if($leave->periods == $period_result->status)
								{
									$result[$time_index]->subjects = '';
									$result[$time_index]->teacher_name ='';
								}else
								{
								  	
								}	
							}
					    }
						$fullday_leave = $this->db->get_where('schoolnew_school_assign_holidays',array('school_id'=>$school_id,'class_id'=>$classid,'section'=>$sectionid,'leavedate'=>$this_week_second,'leavestatus'=>'FD'))->result();
					if(!empty($fullday_leave))	
					{
						for($i=0;$i<=7;$i++)	
		             {
							 $result[$i]->subjects = 'leave';
							 $result[$i]->teacher_name ='leave';
		             }
					}
					$fullschool_leave = $this->db->get_where('schoolnew_school_assign_holidays',array('school_id'=>$school_id,'leavedate'=>$this_week_second,'leavestatus'=>'FS'))->result();
					if(!empty($fullschool_leave))	
					{
						for($i=0;$i<=7;$i++)	
		             {
							 $result[$i]->subjects = 'leave';
							 $result[$i]->teacher_name ='leave';
		             }
					}
						
				}
		}
		//sort($result);
        return $result;
	}
	   	function getweektimetable_data_wednesday_pdf($school_id,$classid,$sectionid,$this_week_third)
	{
		$sql ="select subjects,teacher_name,schoolnew_timetable_weekly_classwise.status from schoolnew_timetable_weekly_classwise 
		left join teacher_subjects on schoolnew_timetable_weekly_classwise.PS=teacher_subjects.id 
		left join udise_staffreg on schoolnew_timetable_weekly_classwise.PT=udise_staffreg.teacher_code where schoolnew_timetable_weekly_classwise.school_id=".$school_id." and schoolnew_timetable_weekly_classwise.class_id=".$classid." and schoolnew_timetable_weekly_classwise.section='".$sectionid."' and schoolnew_timetable_weekly_classwise.timetable_date='".$this_week_third."'";
		$query =  $this->db->query($sql);
        $result=$query->result();
		
		if(!empty($result))
		{
			
				$leave_result = $this->db->get_where('schoolnew_school_assign_holidays',array('school_id'=>$school_id,'class_id'=>$classid,'section'=>$sectionid,'leavedate'=>$this_week_third))->result();
					
				foreach($result as $time_index => $period_result)
				{
					 if(!empty($leave_result))
					   { 
							foreach($leave_result as $leave){
								// echo $leave->periods;
								if($leave->periods == $period_result->status)
								{
									$result[$time_index]->subjects = '';
									$result[$time_index]->teacher_name ='';
								}else
								{
								  	
								}	
							}
					    }
						$fullday_leave = $this->db->get_where('schoolnew_school_assign_holidays',array('school_id'=>$school_id,'class_id'=>$classid,'section'=>$sectionid,'leavedate'=>$this_week_third,'leavestatus'=>'FD'))->result();
					if(!empty($fullday_leave))	
					{
						for($i=0;$i<=7;$i++)	
		             {
							 $result[$i]->subjects = 'leave';
							 $result[$i]->teacher_name ='leave';
		             }
					}
					$fullschool_leave = $this->db->get_where('schoolnew_school_assign_holidays',array('school_id'=>$school_id,'leavedate'=>$this_week_third,'leavestatus'=>'FS'))->result();
					if(!empty($fullschool_leave))	
					{
						for($i=0;$i<=7;$i++)	
		             {
							 $result[$i]->subjects = 'leave';
							 $result[$i]->teacher_name ='leave';
		             }
					}
						
				}
		}
		//sort($result);
        return $result;
	}
	   	function getweektimetable_data_thursday_pdf($school_id,$classid,$sectionid,$this_week_fourth)
	{
		$sql ="select subjects,teacher_name,schoolnew_timetable_weekly_classwise.status from schoolnew_timetable_weekly_classwise 
		left join teacher_subjects on schoolnew_timetable_weekly_classwise.PS=teacher_subjects.id 
		left join udise_staffreg on schoolnew_timetable_weekly_classwise.PT=udise_staffreg.teacher_code where schoolnew_timetable_weekly_classwise.school_id=".$school_id." and schoolnew_timetable_weekly_classwise.class_id=".$classid." and schoolnew_timetable_weekly_classwise.section='".$sectionid."' and schoolnew_timetable_weekly_classwise.timetable_date='".$this_week_fourth."'";
		$query =  $this->db->query($sql);
        $result=$query->result();
		
		if(!empty($result))
		{
			
				$leave_result = $this->db->get_where('schoolnew_school_assign_holidays',array('school_id'=>$school_id,'class_id'=>$classid,'section'=>$sectionid,'leavedate'=>$this_week_fourth))->result();
					
				foreach($result as $time_index => $period_result)
				{
					 if(!empty($leave_result))
					   { 
							foreach($leave_result as $leave){
								// echo $leave->periods;
								if($leave->periods == $period_result->status)
								{
									$result[$time_index]->subjects = '';
									$result[$time_index]->teacher_name ='';
								}else
								{
								  	
								}	
							}
					    }
						$fullday_leave = $this->db->get_where('schoolnew_school_assign_holidays',array('school_id'=>$school_id,'class_id'=>$classid,'section'=>$sectionid,'leavedate'=>$this_week_fourth,'leavestatus'=>'FD'))->result();
					if(!empty($fullday_leave))	
					{
						for($i=0;$i<=7;$i++)	
		             {
							 $result[$i]->subjects = 'leave';
							 $result[$i]->teacher_name ='leave';
		             }
					}
					$fullschool_leave = $this->db->get_where('schoolnew_school_assign_holidays',array('school_id'=>$school_id,'leavedate'=>$this_week_fourth,'leavestatus'=>'FS'))->result();
					if(!empty($fullschool_leave))	
					{
						for($i=0;$i<=7;$i++)	
		             {
							 $result[$i]->subjects = 'leave';
							 $result[$i]->teacher_name ='leave';
		             }
					}
						
				}
		}
		//sort($result);
        return $result;
	}
	   	function getweektimetable_data_friday_pdf($school_id,$classid,$sectionid,$this_week_fifth)
	{
		$sql ="select subjects,teacher_name,schoolnew_timetable_weekly_classwise.status from schoolnew_timetable_weekly_classwise 
		left join teacher_subjects on schoolnew_timetable_weekly_classwise.PS=teacher_subjects.id 
		left join udise_staffreg on schoolnew_timetable_weekly_classwise.PT=udise_staffreg.teacher_code
		where
		schoolnew_timetable_weekly_classwise.school_id=".$school_id." and schoolnew_timetable_weekly_classwise.class_id=".$classid." and schoolnew_timetable_weekly_classwise.section='".$sectionid."' and schoolnew_timetable_weekly_classwise.timetable_date='".$this_week_fifth."'";
		$query =  $this->db->query($sql);
        $result=$query->result();
		
		if(!empty($result))
		{
			
				$leave_result = $this->db->get_where('schoolnew_school_assign_holidays',array('school_id'=>$school_id,'class_id'=>$classid,'section'=>$sectionid,'leavedate'=>$this_week_fifth))->result();
					
				foreach($result as $time_index => $period_result)
				{
					 if(!empty($leave_result))
					   { 
							foreach($leave_result as $leave){
								// echo $leave->periods;
								if($leave->periods == $period_result->status)
								{
									$result[$time_index]->subjects = '';
									$result[$time_index]->teacher_name ='';
								}else
								{
								  	
								}	
							}
					    }
						$fullday_leave = $this->db->get_where('schoolnew_school_assign_holidays',array('school_id'=>$school_id,'class_id'=>$classid,'section'=>$sectionid,'leavedate'=>$this_week_fifth,'leavestatus'=>'FD'))->result();
					if(!empty($fullday_leave))	
					{
						for($i=0;$i<=7;$i++)	
		             {
							 $result[$i]->subjects = 'leave';
							 $result[$i]->teacher_name ='leave';
		             }
					}
					$fullschool_leave = $this->db->get_where('schoolnew_school_assign_holidays',array('school_id'=>$school_id,'leavedate'=>$this_week_fifth,'leavestatus'=>'FS'))->result();
					if(!empty($fullschool_leave))	
					{
						for($i=0;$i<=7;$i++)	
		             {
							 $result[$i]->subjects = 'leave';
							 $result[$i]->teacher_name ='leave';
		             }
					}
						
				}
		}
		//sort($result);
        return $result;
	}
	   	function getweektimetable_data_saturday_pdf($school_id,$classid,$sectionid,$this_week_sixth)
	{
		$sql ="select subjects,teacher_name,schoolnew_timetable_weekly_classwise.status from schoolnew_timetable_weekly_classwise 
		left join teacher_subjects on schoolnew_timetable_weekly_classwise.PS=teacher_subjects.id 
		left join udise_staffreg on schoolnew_timetable_weekly_classwise.PT=udise_staffreg.teacher_code where schoolnew_timetable_weekly_classwise.school_id=".$school_id." and schoolnew_timetable_weekly_classwise.class_id=".$classid." and schoolnew_timetable_weekly_classwise.section='".$sectionid."' and schoolnew_timetable_weekly_classwise.timetable_date='".$this_week_sixth."'";
		$query =  $this->db->query($sql);
        $result=$query->result();
		
		if(!empty($result))
		{
			
				$leave_result = $this->db->get_where('schoolnew_school_assign_holidays',array('school_id'=>$school_id,'class_id'=>$classid,'section'=>$sectionid,'leavedate'=>$this_week_sixth))->result();
					
				foreach($result as $time_index => $period_result)
				{
					 if(!empty($leave_result))
					   { 
							foreach($leave_result as $leave){
								// echo $leave->periods;
								if($leave->periods == $period_result->status)
								{
									$result[$time_index]->subjects = '';
									$result[$time_index]->teacher_name ='';
								}else
								{
								  	
								}	
							}
					    }
						$fullday_leave = $this->db->get_where('schoolnew_school_assign_holidays',array('school_id'=>$school_id,'class_id'=>$classid,'section'=>$sectionid,'leavedate'=>$this_week_sixth,'leavestatus'=>'FD'))->result();
					if(!empty($fullday_leave))	
					{
						for($i=0;$i<=7;$i++)	
		             {
							 $result[$i]->subjects = 'leave';
							 $result[$i]->teacher_name ='leave';
		             }
					}
					$fullschool_leave = $this->db->get_where('schoolnew_school_assign_holidays',array('school_id'=>$school_id,'leavedate'=>$this_week_sixth,'leavestatus'=>'FS'))->result();
					if(!empty($fullschool_leave))	
					{
						for($i=0;$i<=7;$i++)	
		             {
							 $result[$i]->subjects = 'leave';
							 $result[$i]->teacher_name ='leave';
		             }
					}
						
				}
		}
		//sort($result);
        return $result;
	}
	   	function getweektimetable_data_sunday_pdf($school_id,$classid,$sectionid,$this_week_ed)
	{
		$sql ="select subjects,teacher_name,schoolnew_timetable_weekly_classwise.status from schoolnew_timetable_weekly_classwise 
		left join teacher_subjects on schoolnew_timetable_weekly_classwise.PS=teacher_subjects.id 
		left join udise_staffreg on schoolnew_timetable_weekly_classwise.PT=udise_staffreg.teacher_code where schoolnew_timetable_weekly_classwise.school_id=".$school_id." and schoolnew_timetable_weekly_classwise.class_id=".$classid." and schoolnew_timetable_weekly_classwise.section='".$sectionid."' and schoolnew_timetable_weekly_classwise.timetable_date='".$this_week_ed."'";
		$query =  $this->db->query($sql);
        $result=$query->result();
		
		if(!empty($result))
		{
			
				$leave_result = $this->db->get_where('schoolnew_school_assign_holidays',array('school_id'=>$school_id,'class_id'=>$classid,'section'=>$sectionid,'leavedate'=>$this_week_ed))->result();
					
				foreach($result as $time_index => $period_result)
				{
					 if(!empty($leave_result))
					   { 
							foreach($leave_result as $leave){
								// echo $leave->periods;
								if($leave->periods == $period_result->status)
								{
									$result[$time_index]->subjects = '';
									$result[$time_index]->teacher_name ='';
								}else
								{
								  	
								}	
							}
					    }
						$fullday_leave = $this->db->get_where('schoolnew_school_assign_holidays',array('school_id'=>$school_id,'class_id'=>$classid,'section'=>$sectionid,'leavedate'=>$this_week_ed,'leavestatus'=>'FD'))->result();
					if(!empty($fullday_leave))	
					{
						for($i=0;$i<=7;$i++)	
		             {
							 $result[$i]->subjects = 'leave';
							 $result[$i]->teacher_name ='leave';
		             }
					}
					$fullschool_leave = $this->db->get_where('schoolnew_school_assign_holidays',array('school_id'=>$school_id,'leavedate'=>$this_week_ed,'leavestatus'=>'FS'))->result();
					if(!empty($fullschool_leave))	
					{
						for($i=0;$i<=7;$i++)	
		             {
							 $result[$i]->subjects = 'leave';
							 $result[$i]->teacher_name ='leave';
		             }
					}
						
				}
		}
		//sort($result);
        return $result;
	}
	function gettimetable_data_today($today,$school_id)
   {
	 //print_r($tablename);
	 //print_r($school_id);
		$query="SELECT CONCAT(class_id, '-',section) as clas, timetable_date, subjects, udise_staffreg.teacher_name,
		a.PT as teacher_code,a.PS as id,
		attstatus,a.status
FROM schoolnew_timetable_daily_classwise as a

LEFT JOIN udise_staffreg ON a.PT=udise_staffreg.u_id and udise_staffreg.school_key_id=".$school_id."
LEFT JOIN teachers_attend_daily ON a.PT=teachers_attend_daily.teacher_code and teachers_attend_daily.teacher_code !='' and teachers_attend_daily.date='".$today."'  
and teachers_attend_daily.school_id=".$school_id." 
LEFT JOIN teacher_subjects ON a.PS=teacher_subjects.id
WHERE a.school_id =".$school_id."
AND a.timetable_date ='".$today."'
ORDER BY class_id, section, status";
		
		 $result1 = $this->db->query($query)->result();
		//print_r($this->db->last_query());die;
        return $result1;
   }
   function getteacher_data_today($school_id,$today)
   {
	  // $today=date("Y-m-d");
	   $query ="select concat(class_id,'-',section,'-',short_name)as classes,subjects,PT,PS,a.status,udise_staffreg.teacher_name,attstatus,date from 
       schoolnew_timetable_daily_classwise as a
        join udise_staffreg on a.PT =udise_staffreg.u_id and udise_staffreg.school_key_id=".$school_id."
		
        left join teachers_attend_daily on a.PT =teachers_attend_daily.teacher_code and teachers_attend_daily.teacher_code !='' 
		and teachers_attend_daily.date='".$today."'  and teachers_attend_daily.school_id=".$school_id."	
		left join teacher_subjects on a.PS=teacher_subjects.id
		where  a.school_id=".$school_id." and  timetable_date='".$today."'
		
		UNION
		
		select concat(class_id,'-',section,'-',short_name)as classes,subjects,PT,PS,b.status,teacher_volunteers_subjects.teacher_name,attstatus,date from 
       schoolnew_timetable_daily_classwise as b
	   join teacher_volunteers_subjects on b.PT =teacher_volunteers_subjects.teacher_id and teacher_volunteers_subjects.school_key_id=".$school_id."
	   left join teachers_attend_daily on b.PT =teachers_attend_daily.teacher_code and teachers_attend_daily.teacher_code !='' 
		and teachers_attend_daily.date='".$today."'  and teachers_attend_daily.school_id=".$school_id."	
	   left join teacher_subjects on b.PS=teacher_subjects.id
	   where  b.school_id=".$school_id." and  timetable_date='".$today."'
	   
	   UNION
	   
	   select concat(class_id,'-',section,'-',short_name)as classes,subjects,PT,PS,c.status,teacher_volunteers_subjects.teacher_name,attstatus,date from 
       schoolnew_timetable_daily_classwise as c
	   join teacher_volunteers_subjects on c.PT =teacher_volunteers_subjects.teacher_code and teacher_volunteers_subjects.school_key_id=".$school_id."
	   left join teachers_attend_daily on c.PT =teachers_attend_daily.teacher_code and teachers_attend_daily.teacher_code !='' 
		and teachers_attend_daily.date='".$today."'  and teachers_attend_daily.school_id=".$school_id."	
	   left join teacher_subjects on c.PS=teacher_subjects.id
	   where  c.school_id=".$school_id." and  timetable_date='".$today."'
		";
		
        $result1 = $this->db->query($query)->result();
		
        return $result1;
		
   }
   function update_timetable_day($school_id,$class,$section,$period,$updatetimetable,$tablename)
   { 
   
     $today=date("Y-m-d");
	 $this->db->where('school_id',$school_id);
	 $this->db->where('class_id',$class);
	 $this->db->where('section',$section);
	 $this->db->where('status',$period);
	 $this->db->where('timetable_date', $today);
	 $result= $this->db->update($tablename,$updatetimetable); 
     return $result;	
   }
   function update_timetable_daily($school_id,$class,$section,$period,$updatetimetable)
   { 
   
     $today=date("Y-m-d");
	 $this->db->where('school_id',$school_id);
	 $this->db->where('class_id',$class);
	 $this->db->where('section',$section);
	 $this->db->where('status',$period);
	 $this->db->where('timetable_date',$today);
	 $result= $this->db->update('schoolnew_timetable_daily_classwise',$updatetimetable); 
     return $result;	
   }
   	function getweekwise_teacher_timetablereport($school_id)
	{
    $SQL="SELECT count(PT)as count,teacher_name,week(DATE_ADD(timetable_date,  interval  -WEEKDAY(timetable_date)+7 day))as week,DATE_ADD(timetable_date, INTERVAL(8-DAYOFWEEK(timetable_date)) DAY)as day
  FROM schoolnew_timetable_weekly_classwise 
JOIN udise_staffreg ON schoolnew_timetable_weekly_classwise.school_id=udise_staffreg.school_key_id and schoolnew_timetable_weekly_classwise.PT=udise_staffreg.teacher_code 
 where  school_id=".$school_id." and schoolnew_timetable_weekly_classwise.PT != '' AND schoolnew_timetable_weekly_classwise.leavestatus IS NULL
GROUP BY teacher_name,week
";
       $query = $this->db->query($SQL);
       return $query->result();
		
	}
	function getweek($school_id)
	{
    $SQL="SELECT MONTHNAME(timetable_date)as month,week(DATE_ADD(timetable_date, interval  -WEEKDAY(timetable_date)+7 day))as week,date_add(timetable_date, interval  -WEEKDAY(timetable_date)-1 day) Firstdate,DATE_ADD(timetable_date, INTERVAL(8-DAYOFWEEK(timetable_date)) DAY)as lastdate
FROM schoolnew_timetable_weekly_classwise 

 where  school_id=".$school_id."
GROUP BY week
";
       $query = $this->db->query($SQL);
       return $query->result();
		
	}
	function assignedtermclasses($school_id,$this_week_fst,$this_week_ed)
	{
    $SQL="select
schoolnew_section_group.class_id,schoolnew_section_group.section,
MAX((CASE WHEN (schoolnew_section_group.class_id=schoolnew_timetable_weekly_classwise.class_id 
AND schoolnew_section_group.section=schoolnew_timetable_weekly_classwise.section and timetable_date BETWEEN '".$this_week_fst."'  AND '".$this_week_ed."') THEN 1
      ELSE 0 END
))as time_table,
MAX((CASE WHEN (schoolnew_section_group.class_id=schoolnew_timetable_term_classwise.class_id 
AND schoolnew_section_group.section=schoolnew_timetable_term_classwise.section) THEN 1
      ELSE 0 END
))as term_time_table
from schoolnew_timetable_weekly_classwise 
left JOIN schoolnew_section_group ON schoolnew_section_group.school_key_id=schoolnew_timetable_weekly_classwise.school_id
left JOIN schoolnew_timetable_term_classwise ON schoolnew_section_group.school_key_id=schoolnew_timetable_term_classwise.school_id
where  schoolnew_section_group.class_id not in('13','14','15')  and schoolnew_timetable_weekly_classwise.school_id=".$school_id." and schoolnew_timetable_weekly_classwise.PS!=999 group by class_id,section order by class_id";
       $query = $this->db->query($SQL);
       return $query->result();
		
	}
	function termtimetable_details($school_id,$classid,$section)
   {
	   $this->db->select('class_id,section');
        $this->db->from('schoolnew_timetable_term_classwise');
        $this->db->where('school_id',$school_id);
		$this->db->where('class_id',$classid);
		$this->db->where('section',$section);
		//$this->db->where('days',1);
        $query = $this->db->get();
        $result = $query->result();
        return $result; 
   }
   function lastweektimetable_details($school_id,$classid,$section,$previous_week_fst,$previous_week_ed)
   {
	    $this->db->select('class_id,section');
        $this->db->from('schoolnew_timetable_weekly_classwise');
        $this->db->where('school_id',$school_id);
		$this->db->where('class_id',$classid);
		$this->db->where('section',$section);
		$this->db->where('timetable_date >=',$previous_week_fst);
		$this->db->where('timetable_date <=',$previous_week_ed);
        $query = $this->db->get();
        $result = $query->result();
        return $result;    
   }
   function getterm_details_monday($school_id,$classid,$section)
   {
	   $this->db->select('class_id,section,PS,PT,days,status');
        $this->db->from('schoolnew_timetable_term_classwise');
        $this->db->where('school_id',$school_id);
		$this->db->where('class_id',$classid);
		$this->db->where('section',$section);
		$this->db->where('days',1);
		$this->db->where('term_id',1);
        $query = $this->db->get();
        $result = $query->result();
        return $result; 
   }
   function getterm_details_tuesday($school_id,$classid,$section)
   {
	   
	   $this->db->select('class_id,section,PS,PT,days,status');
        $this->db->from('schoolnew_timetable_term_classwise');
        $this->db->where('school_id',$school_id);
		$this->db->where('class_id',$classid);
		$this->db->where('section',$section);
		$this->db->where('days',2);
		$this->db->where('term_id',1);
        $query = $this->db->get();
        $result = $query->result();
        return $result; 
   }
   function getterm_details_wednesday($school_id,$classid,$section)
   {
	   $this->db->select('class_id,section,PS,PT,days,status');
        $this->db->from('schoolnew_timetable_term_classwise');
        $this->db->where('school_id',$school_id);
		$this->db->where('class_id',$classid);
		$this->db->where('section',$section);
		$this->db->where('days',3);
		$this->db->where('term_id',1);
        $query = $this->db->get();
        $result = $query->result();
        return $result; 
   }
   function getterm_details_thursday($school_id,$classid,$section)
   {
	   $this->db->select('class_id,section,PS,PT,days,status');
        $this->db->from('schoolnew_timetable_term_classwise');
        $this->db->where('school_id',$school_id);
		$this->db->where('class_id',$classid);
		$this->db->where('section',$section);
		$this->db->where('days',4);
		$this->db->where('term_id',1);
        $query = $this->db->get();
        $result = $query->result();
        return $result; 
   }
   function getterm_details_friday($school_id,$classid,$section)
   {
	   $this->db->select('class_id,section,PS,PT,days,status');
        $this->db->from('schoolnew_timetable_term_classwise');
        $this->db->where('school_id',$school_id);
		$this->db->where('class_id',$classid);
		$this->db->where('section',$section);
		$this->db->where('days',5);
		$this->db->where('term_id',1);
        $query = $this->db->get();
        $result = $query->result();
        return $result; 
   }
   function getterm_details_saturday($school_id,$classid,$section)
   {
	   $this->db->select('class_id,section,PS,PT,days,status');
        $this->db->from('schoolnew_timetable_term_classwise');
        $this->db->where('school_id',$school_id);
		$this->db->where('class_id',$classid);
		$this->db->where('section',$section);
		$this->db->where('days',6);
		$this->db->where('term_id',1);
        $query = $this->db->get();
        $result = $query->result();
        return $result; 
   }
   function getterm_details_sunday($school_id,$classid,$section)
   {
	   $this->db->select('class_id,section,PS,PT,days,status');
        $this->db->from('schoolnew_timetable_term_classwise');
        $this->db->where('school_id',$school_id);
		$this->db->where('class_id',$classid);
		$this->db->where('section',$section);
		$this->db->where('days',7);
		$this->db->where('term_id',1);
        $query = $this->db->get();
        $result = $query->result();
        return $result; 
   }
   //////////////////////////////
   //* copy lastweek time table*/
   //////////////////////////////
   function getlastweek_details_monday($school_id,$classid,$section,$previous_week_fst)
   {
	   $this->db->select('class_id,section,PS,PT,days,status');
        $this->db->from('schoolnew_timetable_weekly_classwise');
        $this->db->where('school_id',$school_id);
		$this->db->where('class_id',$classid);
		$this->db->where('section',$section);
		$this->db->where('timetable_date',$previous_week_fst);
		$this->db->where('days',1);
        $query = $this->db->get();
        $result = $query->result();
        return $result; 
   }
   function getlastweek_details_tuesday($school_id,$classid,$section,$previous_week_second)
   {
	   $this->db->select('class_id,section,PS,PT,days,status');
        $this->db->from('schoolnew_timetable_weekly_classwise');
        $this->db->where('school_id',$school_id);
		$this->db->where('class_id',$classid);
		$this->db->where('section',$section);
		$this->db->where('timetable_date',$previous_week_second);
		$this->db->where('days',2);
        $query = $this->db->get();
        $result = $query->result();
        return $result; 
   }
   function getlastweek_details_wednesday($school_id,$classid,$section,$previous_week_third)
   {
	   $this->db->select('class_id,section,PS,PT,days,status');
        $this->db->from('schoolnew_timetable_weekly_classwise');
        $this->db->where('school_id',$school_id);
		$this->db->where('class_id',$classid);
		$this->db->where('section',$section);
		$this->db->where('timetable_date',$previous_week_third);
		$this->db->where('days',3);
        $query = $this->db->get();
        $result = $query->result();
        return $result; 
   }
   function getlastweek_details_thursday($school_id,$classid,$section,$previous_week_fourth)
   {
	   $this->db->select('class_id,section,PS,PT,days,status');
        $this->db->from('schoolnew_timetable_weekly_classwise');
        $this->db->where('school_id',$school_id);
		$this->db->where('class_id',$classid);
		$this->db->where('section',$section);
		$this->db->where('timetable_date',$previous_week_fourth);
		$this->db->where('days',4);
        $query = $this->db->get();
        $result = $query->result();
        return $result; 
   }
   function getlastweek_details_friday($school_id,$classid,$section,$previous_week_fifth)
   {
	   $this->db->select('class_id,section,PS,PT,days,status');
        $this->db->from('schoolnew_timetable_weekly_classwise');
        $this->db->where('school_id',$school_id);
		$this->db->where('class_id',$classid);
		$this->db->where('section',$section);
		$this->db->where('timetable_date',$previous_week_fifth);
		$this->db->where('days',5);
        $query = $this->db->get();
        $result = $query->result();
        return $result; 
   }
   function getlastweek_details_saturday($school_id,$classid,$section,$previous_week_sixth)
   {
	   $this->db->select('class_id,section,PS,PT,days,status');
        $this->db->from('schoolnew_timetable_weekly_classwise');
        $this->db->where('school_id',$school_id);
		$this->db->where('class_id',$classid);
		$this->db->where('section',$section);
		$this->db->where('timetable_date',$previous_week_sixth);
		$this->db->where('days',6);
        $query = $this->db->get();
        $result = $query->result();
        return $result; 
   }
   function getlastweek_details_sunday($school_id,$classid,$section,$previous_week_ed)
   {
	   $this->db->select('class_id,section,PS,PT,days,status');
        $this->db->from('schoolnew_timetable_weekly_classwise');
        $this->db->where('school_id',$school_id);
		$this->db->where('class_id',$classid);
		$this->db->where('section',$section);
		$this->db->where('timetable_date',$previous_week_ed);
		$this->db->where('days',7);
        $query = $this->db->get();
        $result = $query->result();
        return $result; 
   }
	   
   
	

}
?>
