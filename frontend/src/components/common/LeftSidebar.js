import { useState } from "react";
import { Sidebar, Menu, MenuItem, sidebarClasses, useProSidebar } from "react-pro-sidebar";
import { Box, IconButton, Typography } from "@mui/material";
import { Link } from "react-router-dom";

import HomeOutlinedIcon from "@mui/icons-material/HomeOutlined";
import TimelineIcon from '@mui/icons-material/Timeline';
import SportsScoreIcon from '@mui/icons-material/SportsScore';
import PlayCircleIcon from '@mui/icons-material/PlayCircle';
import NotesIcon from '@mui/icons-material/Notes';
import SpokeIcon from '@mui/icons-material/Spoke';
import ViewModuleIcon from '@mui/icons-material/ViewModule';
import MenuOutlinedIcon from "@mui/icons-material/MenuOutlined";

import pugPhoto from '../../assets/pugPhoto.png';

const LeftSidebar = () => {
  const [isCollapsed, setIsCollapsed] = useState(false);
  const [selected, setSelected] = useState("dashboard");
  const { collapseSidebar } = useProSidebar();

  return (
    <Box>
      <Sidebar
        style={{ height: "100vh" }}
        collapsed={isCollapsed}
        rootStyles={{
          [`.${sidebarClasses.container}`]: {
            backgroundColor: "#eee"
          },
        }}
      >
        <Menu iconShape="square">
          {/* ====== START logo ====== */}
          <MenuItem
            onClick={() => {
              setIsCollapsed(!isCollapsed);
              collapseSidebar();
            }}
            icon={isCollapsed ? <MenuOutlinedIcon /> : undefined}
            style={{
              margin: "10px 0 20px 0",
              color: "blue",
            }}
          >
            {!isCollapsed && (
              <Box
                display="flex"
                justifyContent="space-between"
                alignItems="center"
                ml="15px"
              >
                <Typography
                  variant="h3"
                  color="blue"
                  fontWeight="bold"
                >
                  Nimda
                </Typography>
                <IconButton onClick={() => setIsCollapsed(!isCollapsed)}>
                  <MenuOutlinedIcon />
                </IconButton>
              </Box>
            )}
          </MenuItem>
          {/* ====== END logo ====== */}

          {/* ====== START profile section ====== */}
          {!isCollapsed && (
            <Box mb="25px">
              <Box display="flex" justifyContent="center" alignItems="center">
                <img
                  alt="profile-user"
                  width="100px"
                  height="100px"
                  src={pugPhoto}
                  style={{ cursor: "pointer", borderRadius: "50%" }}
                />
              </Box>
              <Box textAlign="center">
                <Typography
                  variant="h2"
                  color="blue"
                  fontWeight="bold"
                  sx={{ m: "10px 0 0 0" }}
                >
                  Caiden
                </Typography>
              </Box>
            </Box>
          )}
          {/* ====== END profile section ====== */}

          { /* ====== START navigation buttons ====== */ }
          <Box paddingLeft={isCollapsed ? undefined : "10%"}>
            <MenuItem
              component={<Link to="/" />}
              icon={<HomeOutlinedIcon />}
              selected={selected === 'dashboard'}
              onClick={() => setSelected('dashboard')}
            >
              Dashboard
            </MenuItem>

            {/* ====== START General section ====== */}
            <Typography
              variant="h6"
              color="blue"
              sx={{ m: "15px 0 5px 20px" }}
            >
              {isCollapsed ? '' : 'General'}
            </Typography>
            <MenuItem
              component={<Link to="/progress" />}
              icon={<TimelineIcon />}
              active={selected === 'progress'}
              onClick={() => setSelected('progress')}
            >
              Progress
            </MenuItem>
            <MenuItem
              component={<Link to="/goals" />}
              icon={<SportsScoreIcon />}
              active={selected === 'goals'}
              onClick={() => setSelected('goals')}
            >
              Goals
            </MenuItem>
            <MenuItem
              component={<Link to="/practice" />}
              icon={<PlayCircleIcon />}
              active={selected === 'practice'}
              onClick={() => setSelected('practice')}
            >
              Practice
            </MenuItem>
            {/* ====== END General section ====== */}

            <Typography
              variant="h6"
              color="blue"
              sx={{ m: "15px 0 5px 20px" }}
            >
              {isCollapsed ? '' : 'Learning'}
            </Typography>
            <MenuItem
              component={<Link to="/notes" />}
              icon={<NotesIcon />}
              active={selected === 'notes'}
              onClick={() => setSelected('notes')}
            >
              Notes
            </MenuItem>
            <MenuItem
              component={<Link to="/problems" />}
              icon={<SpokeIcon />}
              active={selected === 'problems'}
              onClick={() => setSelected('problems')}
            >
              Problems
            </MenuItem>
            <MenuItem
              component={<Link to="/flash-cards" />}
              icon={<ViewModuleIcon />}
              className={selected === 'flash-cards'}
              onClick={() => setSelected('flash-cards')}
            >
              Flash cards
            </MenuItem>
          </Box>
          { /* ====== END navigation buttons ====== */ }
        </Menu>
      </Sidebar>
    </Box>
  );
};

export default LeftSidebar;