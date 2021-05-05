<table class='table table-bordered table-striped2'  style="" border="2 solid black"  align="center">
<tr>
  <th colspan="17">Class-II &nbsp;&nbsp;  No Of Students-{{ student_schemes_list_2|length }} </th>
</tr>
  <tr>
    <th  rowspan=2>S.No</th>
    <th rowspan=2>Unique Id</th>
    <th rowspan=2>Student Name</th>
    <th rowspan=2>Uniform size</th>
    <th rowspan=2>Footwear size</th>
    <th rowspan=2>SchoolBag size</th>
    <th rowspan=2>Sweater size</th>
    <th colspan=6>No of NoteBooks</th> 
    <th rowspan=2>Crayon box</th>
    <th rowspan=2>Bread Winner</th>
</tr>

  <tr>
    <td style="color:#00A65A;">Ruled 40</td>
    <td style="color:#00A65A;">Science 40</td>
    <td style="color:#00A65A;">Maths 40</td>
    <td style="color:#00A65A;">2 lines</td>
    <td style="color:#00A65A;">4 lines</td>
    <td style="color:#00A65A;">Drawing</td>
    </tr>





<tr>
<td><input type="hidden" value="{{forloop.counter}}"  ></td>
<td></td>
<td></td>


<td>
<select {% if i.nutritious_meal_flag == '0' %}title="{{ i.name }} did not eat noon meal, so this student not eligible for uniform" {% endif %} style="width:100px;"  name='uniform_{{forloop.counter}}' class="form-control" >
  {% if i.nutritious_meal_flag == '0' %}
  <option title="{{ i.name }} did not eat noon meal, so this student not eligible for uniform" selected   value="{{usn.id}}"  >{{usn}} </option>
  {% else %}
  {% for u in us %}
  <option {% if student_schemes_list_2  and us2.id == u.id %}  selected  {% endif %} value="{{u.id}}"  >{{u}} </option>
  {% endfor %}
  {% endif %}
</select>
</td>

<td>
<select style="width:100px;" name='footware_{{forloop.counter}}' class="form-control" >
  {% for f in fs %}
  <option {% if student_schemes_list_2  and fs2.id == f.id %}  selected  {% endif %} value="{{f.id}}" >{{f}} </option>
  {% endfor %}
</select>
</td>

<td>
<select style="width:100px;"  name='bag_{{forloop.counter}}' class="form-control" >
  {% for b in bs %}
  <option {% if student_schemes_list_2  and bs_sm.id == b.id %}  selected  {% endif %} value="{{b.id}}"  >{{b}} </option>
  {% endfor %}
</select>
</td>

<td>
<select style="width:100px;"  name='sweater_{{forloop.counter}}' class="form-control" >
  {% for s in ss %}
  <option {% if student_schemes_list_2  and ss_sm.id == s.id %} %} selected {% endif %} value="{{s.id}}"  >{{s}} </option>
  {% endfor %}
</select>
</td>
<td>
<input  class="form-control" size="1" readonly name='r40_{{forloop.counter}}'  value=2>
</td>

<td>
<input  class="form-control" size="1" readonly name='s40_{{forloop.counter}}'  value=1>
</td>

<td>
<input  class="form-control" size="1" readonly name='m40_{{forloop.counter}}'  value=1>
</td>

<td>
<input  class="form-control" size="1" readonly name='2l_{{forloop.counter}}'  value=1>
</td>

<td>
<input  class="form-control" size="1" readonly name='4l_{{forloop.counter}}'  value=1>
</td>
<td>
<input  class="form-control" size="1" readonly name='drawing_{{forloop.counter}}'  value=1>
</td>
<td>
<input  class="form-control" size="1" readonly name='crayon_{{forloop.counter}}'  value=1>
</td>
<td >
<select style="width:70px;"  name='bw_{{forloop.counter}}' class="form-control" >
  <option value=1 >YES</option>
  <option value=0 selected >NO </option>
</select>
</td>

<input type="hidden" name="child_{{forloop.counter}}" value="{{ i.child_detail_ptr_id }}">
</tr>


<tr>
  <td colspan="3">Total</td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td class="totalr40" ></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
</tr>

</table>