import { Link } from 'react-router-dom';
import ArrowBackIcon from '@mui/icons-material/ArrowBack';

const TopBar = () => {
  return (
    <div
      style={{
        display: "flex",
        justifyContent: "space-between",
        marginBottom: "20px"
      }}
    >
      <Link
        to="/"
        style={{
          textDecoration: "none",
          display: "flex",
          alignItems: "center",
          justifyContent: "center"
        }}
      >
        <ArrowBackIcon />
        <h3
          style={{
            paddingLeft: "3px"
          }}
        >
          Back
        </h3>
      </Link>
    </div>
  );
}

export default TopBar;