<table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
    <tbody>
    <tr>
        <td align="left" valign="middle" style="padding:15px 0px">
            <a href="http://phonefriend.in" target="_blank">
                <h1>Phone Friend</h1>
            </a>
        </td>
    </tr>
    <tr>
        <td align="left" valign="top" class="m_-634704338486102375maincontainer" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#373737;background-color:#fff;padding:20px;border:solid 1px #bcc2cf">
            Dear <strong>{{App\User::find($order->user_id)->name}}</strong>,<br>
            <br>	Thank you for your order from <a href="http://phonefriend.in" class="m_-634704338486102375hylink2" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#e85f04;text-decoration:underline" target="_blank" >Phone Friend</a><br>
            <br>	Your Order Number for all future references is : <b>{{$order->order_id}}</b><br>
            <br>	For your convenience, we have included a copy of your order below. The charge will appear on your credit card / Account Statement.<br>	<br>		<br>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tbody>
                <tr>
                    <td align="left" valign="top" class="m_-634704338486102375innercontainer" style="background-color:#fff;padding:15px 20px;border:solid 1px #dbdfe6">
                        <table width="100%" border="0" cellspacing="0" cellpadding="6" class="m_-634704338486102375innerborder" style="border:solid 1px #e4e6eb">
                            <tbody>
                            <tr class="m_-634704338486102375tableinner">
                                <td width="47%" height="18" align="left" valign="middle" style="font-family:Arial,Helvetica,sans-serif;font-size:11px;color:#373737;background-color:#f7f7f7"><strong>Order#</strong>
                                </td>
                                <td width="35%" height="18" align="left" valign="middle" style="font-family:Arial,Helvetica,sans-serif;font-size:11px;color:#373737;background-color:#f7f7f7;border-left:solid 1px #e4e6eb"><strong>Item Name</strong>
                                </td>
                                <td width="18%" height="18" align="left" valign="middle" style="font-family:Arial,Helvetica,sans-serif;font-size:11px;color:#373737;background-color:#f7f7f7;border-left:solid 1px #e4e6eb"><strong>Item Price</strong></td>
                            </tr>
                            <tr>
                                <td colspan="3" align="left" valign="middle" class="m_-634704338486102375divider" height="1" style="background-color:#e4e6eb;padding:0px"><img src="https://ci6.googleusercontent.com/proxy/3f3GjW3tjvOHHu29dfFFVpDzb8-eEesPLKgw9nni23Lw3SirQ3M6rpM9sDxpM4yRtqTfNOPUWRycYVWzANgz43tW6AoJv3w=s0-d-e1-ft#https://test.ccavenue.com/images/blank_spacer.gif" width="1" height="1" class="CToWUd"></td>
                            </tr>
                            @foreach($order->orderdevices as $device)
                            <tr>
                                <td width="47%" height="18" align="left" valign="middle" style="font-family:Arial,Helvetica,sans-serif;font-size:11px;color:#373737"><img style="width:70px" src="https://www.phonefriend.in/storage{{str_replace("public", "", App\Phone::find($device->phone_id)->photos->first()->filename)}}"></td>
                                <td width="35%" height="18" align="left" valign="middle" style="font-family:Arial,Helvetica,sans-serif;font-size:11px;color:#373737;border-left:solid 1px #e4e6eb">{{ucwords(App\Phone::find($device->phone_id)->data->company)}} {{App\Phone::find($device->phone_id)->data->model}}</td>
                                <td width="18%" height="18" align="left" valign="middle" style="font-family:Arial,Helvetica,sans-serif;font-size:11px;color:#373737;border-left:solid 1px #e4e6eb"> ₹ {{ number_format(App\Phone::find($device->phone_id)->price,2)}}</td>
                            </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <br>		      <br>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tbody>
                            <tr>

                                <td height="25" colspan="3" align="left" valign="top" class="m_-634704338486102375title" style="font-family:Arial,Helvetica,sans-serif;font-size:15px;color:#0072c6;border-bottom:solid 1px #dbdfe6">Billing Details</td>
                            </tr>
                            <tr>
                                <td colspan="3" align="left" valign="top">&nbsp;</td>
                            </tr>
                            <tr>
                                <td width="412" align="left" valign="top">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="4">
                                        <tbody>
                                        <tr>
                                            <td width="23%" align="right" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:11px;color:#373737"><strong>Customer:</strong></td>
                                            <td width="77%" align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:11px;color:#373737">{{$order->deliver_fname." ".$order->deliver_lname}}&nbsp;&nbsp;|&nbsp;&nbsp;{{$order->deliver_phone}}</td>
                                        </tr>
                                        <tr>
                                            <td align="right" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:11px;color:#373737"><strong>Address:</strong></td>
                                            <td align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:11px;color:#373737">{{$order->deliver_add1}}</td>
                                        </tr>
                                        <tr>
                                            <td align="right" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:11px;color:#373737"><strong>Pay Mode:</strong></td>
                                            <td align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:11px;color:#373737">{{strtoupper($order->payment_mode)}}</td>
                                        </tr>
                                        <tr>
                                            <td align="right" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:11px;color:#373737"><strong>Bank Ref #:</strong></td>
                                            <td align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:11px;color:#373737">@if($order->bank_ref_no){{$order->bank_ref_no}}@else N.A @endif</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td width="20" align="left" valign="top"><img src="https://ci6.googleusercontent.com/proxy/3f3GjW3tjvOHHu29dfFFVpDzb8-eEesPLKgw9nni23Lw3SirQ3M6rpM9sDxpM4yRtqTfNOPUWRycYVWzANgz43tW6AoJv3w=s0-d-e1-ft#https://test.ccavenue.com/images/blank_spacer.gif" width="20" height="1" class="CToWUd"></td>
                                <td width="244" align="right" valign="top">
                                    <table width="244" border="0" cellspacing="0" cellpadding="10">
                                        <tbody>
                                        <tr>
                                            <td align="left" valign="top" class="m_-634704338486102375innerborder m_-634704338486102375tableinner" style="background-color:#f7f7f7;border:solid 1px #e4e6eb">
                                                <table width="244" border="0" cellspacing="0" cellpadding="0">
                                                    <tbody>
                                                    <tr>
                                                        <td width="51%" height="19" align="right" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:11px;color:#373737">Order Amount:&nbsp;</td>
                                                        <td width="16%" height="19" align="center" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:11px;color:#373737">INR</td>
                                                        <td width="33%" height="19" align="right" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:11px;color:#373737">{{number_format($order->amount,2)}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" class="m_-634704338486102375divider"><img src="https://ci6.googleusercontent.com/proxy/3f3GjW3tjvOHHu29dfFFVpDzb8-eEesPLKgw9nni23Lw3SirQ3M6rpM9sDxpM4yRtqTfNOPUWRycYVWzANgz43tW6AoJv3w=s0-d-e1-ft#https://test.ccavenue.com/images/blank_spacer.gif" width="1" height="1" class="CToWUd"></td>
                                                    </tr>
                                                    <tr>
                                                        <td height="22" align="right" valign="bottom" style="font-family:Arial,Helvetica,sans-serif;font-size:11px;color:#373737"><strong>Net Payable:&nbsp;</strong></td>
                                                        <td height="20" align="center" valign="bottom" style="font-family:Arial,Helvetica,sans-serif;font-size:11px;color:#373737"><strong>INR</strong></td>
                                                        <td height="20" align="right" valign="bottom" style="font-family:Arial,Helvetica,sans-serif;font-size:11px;color:#373737"><strong>{{number_format($order->amount,2)}}</strong></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <br>	<br>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tbody>
                            <tr>
                                <td height="1" align="left" valign="top" style="background-color:#e4e6eb;padding:0px" colspan="2"><img src="https://ci6.googleusercontent.com/proxy/3f3GjW3tjvOHHu29dfFFVpDzb8-eEesPLKgw9nni23Lw3SirQ3M6rpM9sDxpM4yRtqTfNOPUWRycYVWzANgz43tW6AoJv3w=s0-d-e1-ft#https://test.ccavenue.com/images/blank_spacer.gif" width="1" height="1" class="CToWUd"></td>
                                <td width="74%" align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#373737"><strong>CUSTOMER CARE<br></strong>https://www.phonefriend.in<br> Email : sandeep.chawla@phonefriend.in<br> Contact Info : 0120-4121361</td>
                                <td width="26%" align="right" valign="bottom"><img src="http://encodezero.com/phonefriend/images/logo1.png" width="130" height="31" border="0" class="CToWUd"></td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>