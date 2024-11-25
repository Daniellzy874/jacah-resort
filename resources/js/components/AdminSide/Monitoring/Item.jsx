import React from 'react'
import ReactDOM, { createPortal } from 'react-dom';
import { useState, useEffect } from 'react';


function Item() {
  const [monitorrecords, setmonitorRecords] = useState([]);
  useEffect(() => {
    const getCategorydata = async () => {
      const reqdata = await fetch("http://127.0.0.1:8000/item_json");
      const resdata = await reqdata.json();
      // console.log(resdata);
      setmonitorRecords(resdata)
    }
    getCategorydata();
  }, []);


  const [search, setSearch] = useState('');

  const [currentPage, setCurentPage] = useState(1);
  const recordsPerPage = 7;
  const lastIndex = currentPage * recordsPerPage;
  const firstIndex = lastIndex - recordsPerPage;
  // const record = records.slice(firstIndex, lastIndex);
  const npage = Math.ceil(monitorrecords.length / recordsPerPage);
  const numbers = [...Array(npage + 1).keys()].slice(1);

  function prePage() {
    if (currentPage !== 1) {
      setCurentPage(currentPage - 1)
    }
  }
  function changeCPage(id) {
    setCurentPage(id)
  }
  function nextPage() {
    if (currentPage !== npage) {
      setCurentPage(currentPage + 1)
    }
  }

  function setsession(id) {
    sessionStorage.setItem('cus-id', id)
  }

  return (
    <div >
      {createPortal(
        <div style={{ display: "flex", paddingLeft: "100px" }}>
          <input type="text"
            placeholder='Search here...'
            onChange={(e) => setSearch(e.target.value)}
            className='searchhere'
            style={{ padding: "10px", borderBottomLeftRadius: "50px", borderTopLeftRadius: "50px", border: "1px solid #dee2e6", width: "100%" }}
          />
          <div style={{ backgroundColor: "green", display: "flex", justifyContent: "center", alignItems: "center", paddingLeft: "10px", paddingRight: "10px", borderBottomRightRadius: "50px", borderTopRightRadius: "50px" }}>
            <svg xmlns="http://www.w3.org/2000/svg" fill='white' className="w-6 h-6" viewBox="0 0 512 512">
              <path d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6 .1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z" />
            </svg>
          </div>

        </div>,
        document.getElementById('searchItemActive')
      )}
      <table className="table">
        <thead className="thead-dark">
          <tr>
            <th scope="col">Customer</th>
            <th scope='col'>Room #</th>
            <th scope='col'>Category</th>
            <th scope="col">Status</th>
            <th scope="col">Details</th>
          </tr>
        </thead>
        <tbody>
          {monitorrecords.filter((item) => {
            return search.toLowerCase() === '' ? item : item.name.toLowerCase().includes(search);
          }).sort((a, b) => a.id > b.id ? -1 : 1).slice(firstIndex, lastIndex).map((a, b) => (
            <tr key={b} className='cursor-pointer text-sm'>
              <td className='uppercase font-bold flex'>
                <div className='flex'>
                  <img src={'assets/image/pofile_pic_default/PROF-PIC.png'} className='h-[50px]  ml-[50px]' alt="" />
                  {
                    a.isActive === 'online' ?
                      <span className='w-[15px] h-[15px] bg-green-500 rounded-full inline-flex ml-1 mb-2 relative  translate-x-[-25px] translate-y-[35px] border-3 border-white'></span>
                      :
                      ''
                  }
                </div>
                <h1 className='justify-center items-center inline-flex'>{a.name}</h1>
              </td>
              <td>
                <h1 className='justify-center items-center inline-flex py-[15px]'>{a.reserve_for}</h1>
              </td>
              <td>
                <h1 className='justify-center items-center inline-flex py-[15px]'>{a.category}</h1>
              </td>
              <td>
                <a href={`./viewCustomerList/${a.id}`} onClick={() => setsession(a.id)} className='hover:bg-gray-300 items-center justify-center inline-flex py-[15px] px-[15px] rounded-full'>
                  <i class='bx bxs-show text-[20px] opacity-50'></i>
                </a>
              </td>

            </tr>

          ))}




        </tbody>
      </table>
      {createPortal(

        <div>
          <nav>
            <ul className='pagination'>
              <li className='page-item'>
                <a href="#" className='page-link' onClick={prePage}>Prev</a>
              </li>
              {
                numbers.map((n, i) => (
                  <li className={`page-item ${currentPage === n ? 'active' : ''}`} key={i}>
                    <a href="#" className='page-link' onClick={() => changeCPage(n)}>{n}</a>
                  </li>
                ))
              }
              <li className='page-item'>
                <a href="#" className='page-link' onClick={nextPage}>Next</a>
              </li>
            </ul>
          </nav>
        </div>,
        document.getElementById('paginate')
      )}

    </div>
  )
}

export default Item
const root = ReactDOM.createRoot(document.getElementById('itemMonitoring'));
root.render(<Item />);
