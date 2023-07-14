import { toLinkText } from '../../common/utils.js';
import { Link } from 'react-router-dom';
import { useState, useEffect } from 'react';

const SubjectLink = ({ title, subtitle }) => {
  return (
    <Link
      to={`/${toLinkText(title)}`}
      style={{
        gridColumn: 'span 1',
        gridRow: 'span 1',

        display: 'flex',
        flexDirection: 'column',
        justifyContent: 'space-evenly',

        border: '1px solid #333',
        padding: '0 20px'
      }}
    >
      <h2>{ title }</h2>
      <p>{ subtitle }</p>
    </Link>
  );
};

const Dashboard = () => {
  let [subjects, setSubjects] = useState([]);

  useEffect(() => {
    getSubjects();
  }, []);

  const getSubjects = async () => {
    let resp = await fetch('http://127.0.0.1:8000/api/subjects/');
    let data = await resp.json();
    setSubjects(data);
  }

  return (
    <div
      style={{
        display: 'grid',
        gridTemplateColumns: 'repeat(3, 1fr)',
        gridAutoRows: '100px',
        gap: '20px'
      }}>

        {subjects.map((subject) => {
          return <SubjectLink title={subject.title} subtitle={subject.subtitle} key={subject.id} />
        })}

    </div>
  );
};

export default Dashboard;