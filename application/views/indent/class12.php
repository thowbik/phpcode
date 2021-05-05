<table class='table table-bordered table-striped2' style="width:60%;"  style="" border="2 solid black"  align="center">
<tr>
  <th colspan="8">Class-XII &nbsp;&nbsp;  No Of Students </th>
</tr>
  <tr>
    <th >S.No</th>
    <th >Unique Id</th>
    <th >Student Name</th>
    <th >SchoolBag size</th>
    <th >Sweater size</th>
    <th >Laptop</th>
    <th >Special Cash Incentive</th> 
    <th >Bread Winner</th>
</tr>

  


<tr>
<td><input type="hidden" value="{{forloop.counter}}"  ></td>
<td></td>
<td></td>



<td>
<select style="width:100px;"  name='bag_{{forloop.counter}}' class="form-control" >
  {% for b in bs %}
  <option {% if student_schemes_list_12  and bs_lr.id == b.id %}  selected  {% endif %} value="{{b.id}}"  >{{b}} </option>
  {% endfor %}
</select>
</td>

<td>
<select style="width:100px;"  name='sweater_{{forloop.counter}}' class="form-control" >
  {% for s in ss %}
  <option {% if student_schemes_list_12  and ss_lr.id == s.id %} %} selected {% endif %} value="{{s.id}}"  >{{s}} </option>
  {% endfor %}
</select>
</td>

<td>
<input  class="form-control" size="1" readonly name='cycle_{{forloop.counter}}'  value=1>
</td>

<td >
<select style="width:70px;"  name='spi_{{forloop.counter}}' class="form-control" >
  <option value=1 >YES</option>
  <option value=0 selected >NO </option>
</select>
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
  <td class="totalr40" ></td>
  <td></td>
  
</tr>
\
</table>