import { useState } from "react";

const DataSender = () => {
  const [data, setData] = useState("");
  const [isPending, setIsPending] = useState(false);

  const sendData = () => {
    fetch("http://localhost:3000/SendToMySql", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({ data }),
    })
      .then((res) => res.json())
      .then((data) => {
        setIsPending(false);
        console.log(data);
      });
  };

  return (
    <div>
      <input
        type="text"
        value={data}
        onChange={(e) => setData(e.target.value)}
      />
      {!isPending && <button onClick={sendData}>Send Data</button>}
      {isPending && (
        <button disabled onClick={sendData}>
          Sending Data...
        </button>
      )}
    </div>
  );
};

export default DataSender;
