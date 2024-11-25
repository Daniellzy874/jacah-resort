import React, { useState, useEffect } from 'react'
import ReactDOM, { createPortal } from 'react-dom';
import Modal from '../Modal';

function MonitorCustomer() {

    const [CustomerData, setCustomerData] = useState({
        'id': sessionStorage.getItem(JSON.stringify('cus-id')),
        'time_out': '',
        'date_out': '',
    })

    console.log(sessionStorage.getItem(JSON.stringify('cus-id')))
    const [TimeOut, setTimeOut] = useState(null);
    function Monitor() {
        let currentDate = new Date();
        // Get the current time as a string (in local time)
        let timeString = currentDate.toLocaleTimeString(); // e.g. "10:45:22 AM"
        setTimeOut(timeString);
        setCustomerData({
            ...CustomerData,
            'time_out': timeString,
        });

    }
    const handleChange = (e) => {
        setCustomerData({
            ...CustomerData,
            [e.target.name]: e.target.value,
        });
    };

    const [isOpenSuccess, setIsOpenSuccess] = useState(false);
    const [isOpenFail, setIsOpenFail] = useState(false);
    const handleSubmit = async (e) => {
        document.getElementById('spin').classList.remove('hidden');
        var inputTime = document.getElementById('time_out').value;
        var inputDate = document.getElementById('date_out').value;
        e.preventDefault();
        try {
            if (inputTime === "" || inputDate === "") {
                // Custom validation message or handling
                setIsOpenFail(true)
                e.preventDefault(); // Prevent form submission
            }
            else {
                const response = await axios.post('/saveCheckOut', CustomerData);
                setIsOpenSuccess(true)
                // setMessage(response.data.message);  // Handle success
            }
        } catch (error) {
            setIsOpenFail(true)
            // setMessage('Error: ' + error.message);  // Handle error
        }
    };
    const closeModalSuccess = () => {
        setIsOpenSuccess(false);
        document.getElementById('spin').classList.add('hidden');
    };
    const closeModalFail = () => {
        setIsOpenFail(false);
        document.getElementById('spin').classList.add('hidden');
    };
    return (
        <>
            <form onSubmit={handleSubmit}>

                <tr>
                    <td className='text-center' scope="row">Date:</td>
                    <td><input onChange={handleChange} type="date" name="date_out" className='w-[100%] border-none' id='date_out' /></td>

                </tr>
                <tr>
                    <td className='text-center' scope="row">Time in:</td>
                    <td><input type="text" name="time_out" value={TimeOut} placeholder='--:--:--' className='border-none' id='time_out' required readOnly /><button type='button' onClick={Monitor} className='btn btn-primary bg-blue-500 absolute left-[83%]'>set</button></td>
                </tr>


                <div className='pt-[5px] flex flex-column gap-2'>
                    <button type='submit' className="inline-flex items-center px-4 py-4 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 flex items-center justify-center h-8 bg-red-500 hover:bg-red-700 active:bg-red-700 focus:bg-red-700">
                        <svg id='spin' className="animate-spin hidden border-solid border-[4px] border-black-200 h-6 w-6 mr-3 bg-transparent border-t-[4px] border-t-white rounded-full" viewBox="0 0 24 24"></svg>
                        Check out
                    </button>
                    <button type='button' data-bs-dismiss="modal" aria-label="Close" className="inline-flex items-centerm px-4 py-4 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 flex items-center justify-center h-8 bg-gray-500 hover:bg-gray-700 active:bg-gray-700 focus:bg-gray-700">Cancel</button>
                </div>
            </form>
            {
                createPortal(
                    <>
                        {/*confirm Success*/}
                        <Modal isOpen={isOpenSuccess} onClose={closeModalSuccess}>
                            <div className='flex flex-column justify-center items-center'>
                                <i className='bx bxs-check-circle text-[70px] text-green-300'></i>
                                <h2 className="font-bold flex justify-center items-center pt-2 text-[30px]">Successful!</h2>
                            </div>
                            <div className='text-center'>
                                <p className="py-2">Check-out successfully, thank you!.</p>
                            </div>
                            <form action='' method='GET'>
                                <div className="flex flex-column justify-center items-center py-4 gap-4">
                                    <button className="btn btn-success bg-green-300 px-12 rounded-full" type="submit">OK</button>
                                    <a className="btn btn-primary bg-blue-300 px-12 rounded-full" href={'./monitoring-item'}>Go to List</a>
                                </div>
                            </form>

                        </Modal>
                        {/* end confirm success*/}
                        {/*confirm fail*/}
                        <Modal isOpen={isOpenFail} >
                            <div className='flex flex-column justify-center items-center'>
                                <i className='bx bxs-x-circle text-[70px] text-red-300'></i>
                                <h2 className="font-bold flex justify-center items-center pt-2 text-[30px]">Error!</h2>
                            </div>
                            <div className='text-center'>
                                <p className="py-2">Failed to check-out, try again.</p>
                            </div>

                            <div className="flex justify-center items-center py-4">
                                <button onClick={closeModalFail} className="btn btn-danger bg-red-300 px-12 rounded-full" type="button">OK</button>
                            </div>
                        </Modal>
                        {/* end confirm fail*/}
                    </>, document.getElementById('alertModal')
                )
            }


        </>
    )
}
const root = ReactDOM.createRoot(document.getElementById('modalMonitoringCheckout'));
root.render(<MonitorCustomer />);
export default MonitorCustomer
