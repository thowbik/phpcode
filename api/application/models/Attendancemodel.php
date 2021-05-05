<?php
class Attendancemodel extends CI_Model
{
    function __construct() {
        parent::__construct();
    }
	

	public function overallllist($school_id,$date){
		$sql="select 
ROUND(((sum(session1_maleP)/sum(session1_maleP+session1_maleA))*100),2) AS malepre,
ROUND(((sum(session1_femaleP)/sum(session1_femaleP+session1_femaleA))*100),2) AS femalepre,
ROUND(((sum(session1_maleA)/sum(session1_maleP+session1_maleA))*100),2) AS maleab,
ROUND(((sum(session1_femaleA)/sum(session1_femaleP+session1_femaleA))*100),2) AS femaleab,
ROUND(((sum(session1_maleP)+sum(session1_femaleP))/(sum(session1_maleP+session1_maleA+session1_femaleP+session1_femaleA))*100),2) as overallpre,
ROUND(((sum(session1_maleA)+sum(session1_femaleA))/(sum(session1_maleP+session1_maleA+session1_femaleP+session1_femaleA))*100),2) as overallab
from 
(select * from students_attend_daily where school_id=".$school_id." AND (DATE(students_attend_daily.date) ".$date.")
union all
select * from students_attend_weekly where school_id=".$school_id." AND (DATE(students_attend_weekly.date) ".$date.")
union all
select * from students_attend_monthly where school_id=".$school_id." AND (DATE(students_attend_monthly.date) ".$date.")
union all
select * from students_attend_yearly where school_id=".$school_id." AND (DATE(students_attend_yearly.date) ".$date.")) as total;";
//echo $sql; die();
		$query= $this->db->query($sql);
		return $query->result_array();
	}
    public function overallclasswise($school_id,$date){
		$sql="select st_class,
		st_section,
		malepre,
		femalepre,
		maleab,
		femaleab, 
		classpre as clspre,
		classab as clsab
from (select st_class,st_section,
ROUND(((sum(session1_maleP)/sum(session1_maleP+session1_maleA))*100),2) AS malepre,
ROUND(((sum(session1_femaleP)/sum(session1_femaleP+session1_femaleA))*100),2) AS femalepre,
ROUND(((sum(session1_maleA)/sum(session1_maleP+session1_maleA))*100),2) AS maleab,
ROUND(((sum(session1_femaleA)/sum(session1_femaleP+session1_femaleA))*100),2) AS femaleab,
ROUND(((sum(session1_maleP)+sum(session1_femaleP))/(sum(session1_maleP+session1_maleA+session1_femaleP+session1_femaleA))*100),2) as classpre,
ROUND(((sum(session1_maleA)+sum(session1_femaleA))/(sum(session1_maleP+session1_maleA+session1_femaleP+session1_femaleA))*100),2) as classab
from 
(select * from students_attend_daily where school_id=".$school_id." AND (DATE(students_attend_daily.date) ".$date.")
union all
select * from students_attend_weekly where school_id=".$school_id." AND (DATE(students_attend_weekly.date) ".$date.")
union all
select * from students_attend_monthly where school_id=".$school_id." AND (DATE(students_attend_monthly.date) ".$date.")
union all
select * from students_attend_yearly where school_id=".$school_id." AND (DATE(students_attend_yearly.date) ".$date.")) as total group by st_class,st_section) as totpreab order by clspre desc,clsab asc;";
//echo $sql; die();
// group by st_class,st_section order by overall desc limit 5 echo $sql; die();
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	public function staffdayoverallist($school_id){
		$sql="select 
school_id,
totabcount,
teaching,
nonteaching,
totteaching,
totnonteaching,
round(100-(((teaching)/(totteaching))),2) as day_teachabper,
round(100-(((nonteaching)/(totnonteaching))),2) as day_nontabper,
round((100-(((teaching)/(totteaching)))+100-(((nonteaching)/(totnonteaching))))/2,2) as day_overall

 from (select 
school_id,
sum(u_id=teachers_attend_daily.teacher_code) as totabcount,
u_id,
category,
sum(case when u_id=teachers_attend_daily.teacher_code then case when category=1 then 1 else 0 end end) as teaching,
sum(case when u_id=teachers_attend_daily.teacher_code then case when category=2 then 1 else 0 end end) as nonteaching,
totteaching,totnonteaching
from
udise_staffreg
join teachers_attend_daily on teachers_attend_daily.school_id=udise_staffreg.school_key_id

join teacher_type on teacher_type.id=udise_staffreg.teacher_type
 
join (
select 
count(1) as total,sum(category=1) as totteaching,sum(category=2) as totnonteaching,
school_key_id
 from udise_staffreg 
join teacher_type on teacher_type.id=udise_staffreg.teacher_type
where school_key_id=".$school_id.") as totalstaff on totalstaff.school_key_id=udise_staffreg.school_key_id
where school_id=".$school_id." and attstatus!='OD'
and (DATE(teachers_attend_daily.date) BETWEEN DATE(NOW()) AND DATE(now()))) as total;";
//echo $sql; die();
		$query=$this->db->query($sql);
		return $query->result_array();
	}
	
	
	public function staffwisedayoveralllist($school_id){
		$sql="select school_key_id,udise_staffreg.teacher_name,(case when attstatus='OD' or attstatus is null then '100' else '0' end)as pper from udise_staffreg 
left join teachers_attend_daily on teachers_attend_daily.teacher_code=udise_staffreg.u_id and teachers_attend_daily.teacher_code!='' and teachers_attend_daily.teacher_code!=null and teachers_attend_daily.school_id=".$school_id." 
where school_key_id=".$school_id." and archive=1 order by pper desc;";
		$query=$this->db->query($sql);
		return $query->result_array();
	}
	
	
	public function staffoveralllist($school_id){
		$sql="select school_id,yearly_teach_per,yearly_nonteach_per,yearly_overall,monthly_teach_per,monthly_nonteach_per,monthly_overall,weekly_teach_per,weekly_nonteach_per,weekly_overall from teachers_attend_overall where school_id=".$school_id.";";
		//echo $sql; die();
		$query=$this->db->query($sql);
		return $query->result_array();
	}
	
	public function staffsummary_weekly_list($school_id){
		$sql="select school_key_id,absentdays,workingdays,udise_staffreg.teacher_code,udise_staffreg.teacher_name,teach_weekly_pre from udise_staffreg 
left join teachers_attend_weekly_summary on teachers_attend_weekly_summary.u_id=udise_staffreg.u_id where school_key_id=".$school_id." and archive=1 order by teach_weekly_pre asc;";
		//echo $sql; die();
		$query=$this->db->query($sql);
		return $query->result_array();
	}
	
	public function staffsummary_monthly_list($school_id){
		$sql="select school_key_id,absentdays,workingdays,udise_staffreg.teacher_code,udise_staffreg.teacher_name,teach_monthly_pre from udise_staffreg 
left join teachers_attend_monthly_summary on teachers_attend_monthly_summary.u_id=udise_staffreg.u_id where school_key_id=".$school_id." and archive=1 order by teach_monthly_pre asc;";
		$query=$this->db->query($sql);
		return $query->result_array();
	}
	
	public function staffsummary_yearly_list($school_id){
		$sql="select school_key_id,absentdays,workingdays,udise_staffreg.teacher_code,udise_staffreg.teacher_name,teach_yearly_pre from udise_staffreg 
left join teachers_attend_yearly_summary on teachers_attend_yearly_summary.u_id=udise_staffreg.u_id where school_key_id=".$school_id." and archive=1 order by teach_yearly_pre asc;";
		$query=$this->db->query($sql);
		return $query->result_array();
	}
	
	
	
	
	
	
	public function facilitieslist($school_id){
		$sql="select
drnkwater_avail as drinkingwater,
toil_gents_tot as staffgentstoil,toil_ladies_tot as staffladiestoil,
urinal_gents_tot as staffgentsurinal,urinals_tot_ladies as staffladiesurinal,
toil_bys_inuse as usetoilboys,toil_inuse_grls as usetoilgirls,toil_notuse_bys as toilnotuseboys,toil_notuse_grls as toilnotusegirls,urinls_inuse_bys as urinalinuseboys,urinls_inuse_grls as urinalinusegirls,
urinls_notuse_bys as urinalnotinuseboys,urinls_notuse_grls as urinalnotinusegirls,
case when incinerator=1 then 'Available' when incinerator=0 then 'Not Available' when incinerator='' then 'Not Available' when incinerator is null then 'Not Available' end as incinerator
 from schoolnew_infra_detail where school_key_id=".$school_id.";";
 //echo $sql; die();
 $query=$this->db->query($sql);
 return $query->result_array();
	}
	
	public function schemeindent($school_id){
		$sql="select scheme_name,sum(totalapplied) as totalapplied,sum(strength) as strength,concat(round(sum(totalapplied)/sum(strength)*100,2),'%') as overall from (select schoolnew_schemeindent.class,scheme_name,count(1) as totalapplied,strength from schoolnew_schemeindent
		join schoolnew_freescheme on schoolnew_freescheme.id=schoolnew_schemeindent.scheme_id
		join (select class_studying_id,count(1) as strength from students_child_detail where school_id=".$school_id." and transfer_flag=0 group by class_studying_id) as s1 on s1.class_studying_id=schoolnew_schemeindent.class
		 where schoolnew_schemeindent.school_id=".$school_id." group by schoolnew_schemeindent.scheme_id,schoolnew_schemeindent.class
		 union all
		 select class,scheme_name,count(1) as totalapplied,strength from schoolnew_books_dist 
		join schoolnew_freescheme on schoolnew_freescheme.id=schoolnew_books_dist.scheme_id
		join (select class_studying_id,count(1) as strength from students_child_detail where school_id=".$school_id." and transfer_flag=0 group by class_studying_id) as s1 on s1.class_studying_id=schoolnew_books_dist.class
		where school_id=".$school_id." group by class
		union all
		select class,scheme_name,count(1) as totalapplied,strength from schoolnew_computerindent 
		join schoolnew_freescheme on schoolnew_freescheme.id=schoolnew_computerindent.scheme_id
		join (select class_studying_id,count(1) as strength from students_child_detail where school_id=".$school_id." and transfer_flag=0 group by class_studying_id) as s1 on s1.class_studying_id=schoolnew_computerindent.class
		where school_id=".$school_id." group by schoolnew_computerindent.class
		union all 
		select class,scheme_name,count(1) as totalapplied,strength from schoolnew_notebooks_dist 
		join schoolnew_freescheme on schoolnew_freescheme.id=schoolnew_notebooks_dist.scheme_id
		join (select class_studying_id,count(1) as strength from students_child_detail where school_id=".$school_id." and transfer_flag=0 group by class_studying_id) as s1 on s1.class_studying_id=schoolnew_notebooks_dist.class
		where school_id=".$school_id." group by schoolnew_notebooks_dist.class
		) as classwise group by scheme_name;";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	
	/***********************************************************
						Studentwise
	*************************************************************/
	public function studentclasslist($school_id,$where){
		$sql="select st_class,st_section,rdate,session1_allP,session1_allA,totalstudents,concat(class_studying_id,'-',class_section) as class,concat(floor(sum(session1_allP)/sum(totalstudents)*100),'%') as perpresent,concat(100-floor(sum(session1_allP)/sum(totalstudents)*100),'%') as perabsent from (
		select school_id,st_class,st_section,date as rdate,session1_allP,session1_allA from students_attend_daily where school_id=".$school_id."
		union all
		select school_id,st_class,st_section,date as rdate,session1_allP,session1_allA from students_attend_weekly where school_id=".$school_id."
		union all
		select school_id,st_class,st_section,date as rdate,session1_allP,session1_allA from students_attend_monthly where school_id=".$school_id."
		union all
		select school_id,st_class,st_section,date as rdate,session1_allP,session1_allA from students_attend_yearly where school_id=".$school_id."
		) as der
		join (
		select count(1) as totalstudents,class_studying_id,class_section from students_child_detail where school_id=".$school_id." and transfer_flag=0 group by class_studying_id,class_section) as stcount on stcount.class_studying_id=der.st_class and stcount.class_section=der.st_section where ".$where." group by st_class,st_section;";
		//echo $sql; die();
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	public function classwise($school_id,$class_id,$section,$where,$grp="students_child_detail.id"){
		$sql="select *,concat(round((cnt/totaldays)*100,2),'%') as pper from (select name,students_child_detail.id,concat(class_studying_id,'-',class_section) as class,
IF(FIND_IN_SET(students_child_detail.id,absentese.students)>0,'A','P') AS abstatus,
SUM(IF(FIND_IN_SET(students_child_detail.id,absentese.students)>0,0,1)) AS cnt,
count(rdate) as totaldays,rdate,students_child_detail.id as stdid,students_child_detail.unique_id_no
from students_child_detail 
JOIN (
SELECT * FROM (select school_id,st_class,st_section,date as rdate,session1_allP,session1_allA,
concat(if(session1_students is not null, session1_students,'0'),',',if(session2_students is not null,session2_students,'0')) as students
 from students_attend_daily where school_id=".$school_id." and st_class=".$class_id." and st_section='".$section."'
union all
select school_id,st_class,st_section,date as rdate,session1_allP,session1_allA, 
concat(if(session1_students is not null, session1_students,'0'),',',if(session2_students is not null,session2_students,'0'))
from students_attend_weekly where school_id=".$school_id." and st_class=".$class_id." and st_section='".$section."'
union all
select school_id,st_class,st_section,date as rdate,session1_allP,session1_allA, 
concat(if(session1_students is not null, session1_students,'0'),',',if(session2_students is not null,session2_students,'0'))
from students_attend_monthly where school_id=".$school_id." and st_class=".$class_id." and st_section='".$section."'
union all
select school_id,st_class,st_section,date as rdate,session1_allP,session1_allA, 
concat(if(session1_students is not null, session1_students,'0'),',',if(session2_students is not null,session2_students,'0'))
from students_attend_yearly where school_id=".$school_id." and st_class=".$class_id." and st_section='".$section."') AS der ) AS absentese
ON absentese.school_id=students_child_detail.school_id AND
absentese.st_class=students_child_detail.class_studying_id AND
absentese.st_section=students_child_detail.class_section
WHERE ".$where." AND 
students_child_detail.class_studying_id = ".$class_id." AND 
students_child_detail.class_section = '".$section."' AND students_child_detail.school_id=".$school_id." group by ".$grp.") as totalderived ".($grp=='students_child_detail.id'?'':'order by rdate asc');
//echo $sql; die();
		$query=$this->db->query($sql);
		return $query->result_array();
	}
	
	
	/***********************************************************
						Staffwise
	*************************************************************/
	public function staffwiselist($school_id,$where,$where1,$checkbit=0){
		$sql="select rdate,
teacher_code,teacher_name,abstatus,workingdays,abcnt,
concat(round((100-(abcnt/workingdays)*100),2),'%') as pper,type_teacher,case when category=1 then 'Teaching' when category=2 then 
'Non-Teaching' else 'NA' end as ctype,u_id
from (SELECT rdate,udise_staffreg.teacher_code,udise_staffreg.teacher_name,attstatus,attres,
IF((attstatus is null),'P',IF(attstatus='OD','P - OD',concat('A - ',attstatus))) AS abstatus,
IF((attstatus='OD' or attstatus is null),0,sum(udise_staffreg.u_id=ablist.teacher_code)) as abcnt,
workingdays,type_teacher,category,udise_staffreg.u_id
 FROM 
udise_staffreg
LEFT JOIN
(
select date as rdate,school_id,teacher_code,teacher_name,attstatus,attres from teachers_attend_daily where school_id=".$school_id."  and ".$where."
union all
select date as rdate,school_id,teacher_code,teacher_name,attstatus,attres from teachers_attend_weekly where school_id=".$school_id."  and ".$where."
union all 
select date as rdate,school_id,teacher_code,teacher_name,attstatus,attres from teachers_attend_monthly where school_id=".$school_id."  and ".$where."
union all
select date as rdate,school_id,teacher_code,teacher_name,attstatus,attres from teachers_attend_yearly where school_id=".$school_id."  and ".$where."
) AS ablist
  ON ablist.school_id=udise_staffreg.school_key_id AND ablist.teacher_code=udise_staffreg.u_id
JOIN (select count(1) as workingdays,school_id from(
SELECT * FROM 
(select school_id,date as rdate from teachers_attend_daily where school_id=".$school_id."  and ".$where."
union all
select school_id,date as rdate from teachers_attend_weekly where school_id=".$school_id."  and ".$where."
union all 
select school_id,date as rdate from teachers_attend_monthly where school_id=".$school_id."  and ".$where."
union all
select school_id,date as rdate from teachers_attend_yearly where school_id=".$school_id."  and ".$where."
) AS toder
GROUP BY rdate
) as totalworking) AS workcalc ON workcalc.school_id=udise_staffreg.school_key_id
join teacher_type on teacher_type.id=udise_staffreg.teacher_type
WHERE school_key_id=".$school_id." AND udise_staffreg.archive=1
GROUP BY udise_staffreg.teacher_code".($checkbit==1?",rdate":"").") as pper ".$where1.";";
	//echo $sql; die();
	$query = $this->db->query($sql);
	return $query->result_array();
		
	}
	
	
	/********************************************************************
						Facilities List
	********************************************************************/
	public function facilitiesschool($school_id){
		$sql="select
drnkwater_avail as drinkingwater,
case when drnkwater_avail=1 then 'Yes' when drnkwater_avail=2 then 'No' else 'NA' end as drinkchoose,
case when drnkwater_avail=1 then 'Available' when drnkwater_avail=2 then 'Not Available' else 'NA' end as drink,
(case when drnkwater_source=1 then 'Hand pumps' when drnkwater_source=2 then 'Well' when drnkwater_source=3 then 'Tap water' when drnkwater_source=4 then 'RO purifier' when drnkwater_source=5 then 'Packaged / Bottled water' when drnkwater_source=-1 then  drnkwater_othsource else 'NA' end) as drinktypes,
sum(toil_gents_tot+toil_ladies_tot) as tottoilstaff,
sum(urinal_gents_tot+urinals_tot_ladies) as toturnalstaff,
sum(toil_bys_inuse+toil_notuse_bys+toil_inuse_grls+toil_notuse_grls) as tottoil,
sum(urinls_inuse_bys+urinls_notuse_bys+urinls_inuse_grls+urinls_notuse_grls) as toturi,
sum(toil_bys_inuse+toil_notuse_bys) as bystottoil,
sum(toil_inuse_grls+toil_notuse_grls) as glstottoil,
sum(urinls_inuse_bys+urinls_notuse_bys) as bystoturi,
sum(urinls_inuse_grls+urinls_notuse_grls) as glstoturi,
toil_gents_tot as staffgentstoil,
toil_ladies_tot as staffladiestoil,
urinal_gents_tot as staffgentsurinal,
urinals_tot_ladies as staffladiesurinal,
toil_bys_inuse as usetoilboys,
toil_inuse_grls as usetoilgirls,
toil_notuse_bys as toilnotuseboys,
toil_notuse_grls as toilnotusegirls,
urinls_inuse_bys as urinalinuseboys,
urinls_inuse_grls as urinalinusegirls,
urinls_notuse_bys as urinalnotinuseboys,
urinls_notuse_grls as urinalnotinusegirls,
sum(toil_bys_inuse+toil_inuse_grls) as totfun,
sum(toil_notuse_bys+toil_notuse_grls) as totnonfun,
sum(urinls_inuse_bys+urinls_inuse_grls) as totfunuri,
sum(urinls_notuse_bys+urinls_notuse_grls) as totnonfunuri,
(case when incinerator=1 then 'Available' when incinerator=0 then 'Not Available' when incinerator='' then 'Not Available' when incinerator is null then 'Not Available' end) as incinerator,
(case when incinerator=1 then inci_auto_avail_no else 'NA' end) as inci_auto_avail_no,
(case when incinerator=1 then inci_auto_func_no else 'NA' end) as inci_auto_func_no,
(case when incinerator=1 then inci_man_avail_no else 'NA' end) as inci_man_avail_no,
(case when incinerator=1 then inci_man_func_no else 'NA' end) as inci_man_func_no
 from schoolnew_infra_detail where school_key_id=".$school_id.";";
	$query= $this->db->query($sql);
	return $query->result_array();
	}
	
	
	/*******************************************************
		School Profile Photos save done by Ramco Magesh
	******************************************************/
	
	public function updatephoto($up,$school_id){
		//print_r($up);die();
        $this->db->where('school_key_id', $school_id);      
		$this->db->update('schoolnew_infra_detail',$up); 
		return $school_id;
    }
	
}
?>