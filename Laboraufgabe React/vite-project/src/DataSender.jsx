import React, { useState } from 'react';

const DataSender = () => {
  const [data, setData] = useState('');
  const [isPending, setIsPending] = useState(false);

  const sendData = (e) => {
    const response = fetch('localhost:3000/SendToMySql', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'Access-Control-Allow-Origin': '*',
      },
      body: JSON.stringify({ data }),
    }).then(() => {
      console.log("Sending Data");
      setIsPending(false);
    });
    const result = response.json();
    console.log(result);
  };

  return (
    <div>
      <input
        type="text"
        value={data}
        onChange={(e) => setData(e.target.value)}
      />
      { !isPending && <button onClick={sendData}>Send Data</button> }
      { isPending && <button disabled onClick={sendData}>Sending Data...</button>}
    </div>
  );
};

export default DataSender;
